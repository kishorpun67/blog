<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Hash;
use Auth;

class UserController extends Controller
{
    public function login(Request $request) 
    {
        if($request->isMethod('POST')){
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return to_route('index')->with('success', 'You have been login successfully.');
            }
            return redirect()->back()->with('error','The provided credentials do not match our records.',);
        }
        Session::flash('page', 'login');
        return view('frontend.user.login');
    }

    public function register(Request $request)
    {

        if($request->isMethod('POST')){
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);
    
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('login')->with('success', 'Registration successful! Please login.');
        }
        Session::flash('page', 'register');
        return view('frontend.user.register');
        
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('index')->with('success', 'You have been logged out.');
    }

    public function verify()
    {
        User::where('id', auth()->user()->id)->update(['status' => 1]);
        return redirect()->back()->with('success', 'Your account has been varified successfully.');
    }

    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        
        // Check if email exists in the database
        $exists = User::where('email', $email)->exists();
        
        // Return JSON response
        return response()->json(['exists' => $exists]);
    }
}
