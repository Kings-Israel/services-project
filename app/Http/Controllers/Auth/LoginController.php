<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Authentication APIs
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $pageConfigs = [
            'bodyClass' => "bg-full-screen-image",
            'blankPage' => true
        ];

        return view('/admin/auth/login', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    /**
     * Login the user to their account
     *
     * @bodyParam email string required The user's email address
     * @bodyParam password string required The user's password
     *
     * @responseField user_data The user's data
     * @responseField access_token The user's access token
     */
    public function login(Request $request)
    {
        if (!$request->wantsJson()) {
            $this->validate(request(), [
                'email' =>'required_without:phone_number',
                'phone_number' =>'required_without:email',
                'password' =>'required',
            ]);

            $credentials = request()->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('/');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'email' => ['required_without:phone_number'],
                'phone_number' => ['required_without:email'],
                'password' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->messages(), 422);
            }

            $credentials = request()->only('email', 'password');

            if ($request->has('phone_number')) {
                if (!Auth::attempt(['phone_number' => $request->phone_number, 'password' => $request->password], true)) {
                    return response()->json(['phone_number' => 'The provided credentials are invalid'], 422);
                }
            } elseif ($request->has('email')) {
                if (!Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
                    return response()->json(['email' => 'The provided credentials are invalid'], 422);
                }
            }

            $token = $request->user()->createToken($request->email);

            $user = User::when($request->has('email'), function ($query) use ($request) {
                            $query->where('email', $request->email);
                        })
                        ->when($request->has('phone_number'), function ($query) use ($request) {
                            $query->where('phone_number', $request->phone_number);
                        })
                        ->first();

            if ($request->has('device_token') && $request->device_token != '') {
                $user->update([
                    'device_token' => $request->device_token,
                ]);
            }

            return response()->json([
                'access_token' => $token,
                'user_data' => $user,
            ]);
        }
    }
}
