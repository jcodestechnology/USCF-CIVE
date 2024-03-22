<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program; // Make sure to import the Program model
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function storeProgramName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $program = new Program();
        $program->name = $request->name;
        $program->save();

        return back()->with('success', 'Program name stored successfully.');
    }

    public function redirectToSignup()
    {
        $programs = Program::all(['id', 'name']);
        return view('signup')->with('programs', $programs);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:12|unique:users,phone',
            'email' => 'required|email|unique:users',
            'user_role' => 'required|string|max:255',
            'program_id' => 'required|exists:programs,id',
            'password' => 'required|string',
            'profile' => 'nullable|string',
            'year_started' => 'required',
            'year_completion' => 'required',
            'gender' => 'required', // Assuming only 'male' and 'female' are allowed
            'block' => 'required|numeric',
        ]);
    
        // Create a new instance of the User model
        $user = new User();
        $user->firstname = $request->input('firstname');
        $user->middlename = $request->input('middlename');
        $user->lastname = $request->input('lastname');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->user_role = $request->input('user_role');
        $user->program_id = $request->input('program_id');
        $user->password = Hash::make($request->input('password')); // Hash the password
        $user->profile = $request->input('profile');
        $user->year_started = $request->input('year_started');
        $user->year_completion = $request->input('year_completion');
        $user->gender = $request->input('gender');
        $user->block = $request->input('block');
    
        // Save the user
        if ($user->save()) {
            return back()->with('success', 'Account created successfully.');
        } else {
            return back()->with('error', 'Failed to create user.');
        }
    }

    public function getAllUsers()
{
    $users = User::all();
    
    // Return the users to a view or process them as needed
    return view('users', ['users' => $users]); // Assuming you want to pass the users to a view called 'users.index'
}
    
}
