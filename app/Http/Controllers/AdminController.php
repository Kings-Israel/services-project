<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate(request(), [
            'email' =>'required|email',
            'password' =>'required'
        ]);

        $credentials = request()->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function services()
    {
        return view('admin.content.services.index');
    }

    public function reviews()
    {
        $reviews = Review::with('service')->get();
        
        // TODO: Add view to see all reviews
    }
}
