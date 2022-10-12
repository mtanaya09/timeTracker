<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index() //this index
    {
        return "Hello user controller";
    }

    //show a form that will create new student or user 
    public function login()
    {
        // dd("test");
        if (View::exists('user.login')) {
            return view('user.login');
        } else {
            // return response()->view('errors.404');
            return abort(404);
        }
    }

    //To process login session
    public function process(Request $request)
    {
        //to validate and process user's input
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);

        if (auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Welcome back!');
        }
        //return one step or back one step
        return back()->withErrors(['email' => 'Login failed'])->onlyInput('email');
    }

    //function that will display registration form
    public function register()
    {
        return view('user.register');
    }

    //logout user
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        //upon redirecting this will display flash message/session to reconfirm to the user the logout method
        return redirect('/login')->with('message', 'Logout successful');
    }

    //store user's data
    public function store(Request $request)
    {
        // dd($request);
        //to validate user's input
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|confirmed|min:6'
        ]);

        //after the process of checking hash the validated user
        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        //the nav to login is optional, you can also proceed with some verification: email, otp etc.
        auth()->login($user);
        return redirect('/')->with('message', 'Welcome to Time Tracker');
    }


    //show data from DB
    public function show($id)
    {

        $data = ['data' => 'data from database'];

        return view('user')
            ->with('data', $data)
            ->with('name', 'Kel tanayas')
            ->with('age', '22')
            ->with('email', 'm.tanaya.prescribe-digital.com')
            ->with('id', $id);
    }
};
