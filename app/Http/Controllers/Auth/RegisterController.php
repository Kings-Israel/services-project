<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use F9Web\ApiResponseHelpers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Authentication APIs
 */
class RegisterController extends Controller
{
    use RegistersUsers, ApiResponseHelpers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Register New User.
     *
     * @bodyParam f_name string required The user's first name
     * @bodyParam l_name string required The user's last name
     * @bodyParam email string required The user's email address
     * @bodyParam phone_number string required The user's phone number
     * @bodyParam password string required The user's password
     * @bodyParams password_confirmation string required The user's password confirmation
     *
     * @responseField user_data The user's data
     * @responseField access_token The user's access token
     */
    public function create(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = User::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        if ($request->wantsJson()) {
            $token = $user->createToken($user->email)->plainTextToken;

            if ($request->has('device_token') && $request->device_token != '') {
                $user->update([
                    'device_token' => $request->device_token,
                ]);
            }

            // return response()->json([
            //     'access_token' => $token,
            //     'user_data' => $user,
            // ]);
            return $this->respondWithSuccess(['data' => $user, 'token' => $token]);
        } else {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
    }

    // Register
    public function showRegistrationForm()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/register', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    /**
     *
     * Social Login
     *
     * Login through google
     * @bodyParam name string required The name of the user
     * @bodyParam email string required The email of the user
     * @bodyParam phone_number string The user's phone number
     * @bodyParam token string A google provided token
     * @bodyParam email_verified boolean Whether the user email is verified
     *
     * @response 200
     *
     * @responseField accessToken The authentication token that will be used to make other requests
     * @responseField userData The authenticated user information
     *
     */
    public function googleAuthenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        try{
            $user = User::where('email', $request->email)->first();
            if($user){
                $user->update([
                    'google_token' => $request->has('token') && $request->token != '' ? $request->google_id : NULL,
                    'device_token' => $request->has('device_token') && $request->device_token != '' ? $request->device_token : NULL,
                ]);

                Auth::login($user);

                $token = $user->createToken($user->email)->plainTextToken;

                return response()->json([
                    'access_token' => $token,
                    'user_data' => $user,
                ]);
            } else {
                $user = User::create([
                    'f_name' => explode(' ', $request->name)[0],
                    'l_name' => explode(' ', $request->name)[1] != '' ? explode(' ', $request->name)[1] : NULL,
                    'phone_number' => $request->phone_number != '' ? $request->phone_number : NULL,
                    'email' => $request->email,
                    'email_verified_at' => $request->has('email_verified') && $request->email_verified == 'true' ? now() : NULL,
                    'password' => Hash::make('password'),
                    'google_id' => $request->has('token') && $request->token != '' ? $request->token : NULL,
                    'device_token' => $request->has('device_token') && $request->device_token != '' ? $request->device_token : NULL,
                ]);

                $savedUser = User::where('id', $user->id)->first();

                Auth::login($savedUser);

                if ($request->wantsJson()) {
                    $token = $user->createToken($request->email)->plainTextToken;
                    // return response()->json([
                    //     'access_token' => $token,
                    //     'user_data' => $savedUser,
                    // ]);
                    return $this->respondWithSuccess(['data' => $savedUser, 'token' => $token]);
                } else {
                    $request->session()->regenerate();
                    return redirect()->intended('/');
                }
            }
        }catch(\Exception $exception){
            info($exception);
            return response()->json(['message' => $exception], Response::HTTP_BAD_REQUEST);
        }
    }
}
