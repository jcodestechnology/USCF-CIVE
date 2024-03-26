<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program; // Make sure to import the Program model
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Management;
use App\Models\Event;

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
        $programName = Program::find($user->program_id)->name;
        $user->program_name = $programName;
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
         // Get the current month and year
    $currentMonth = date('m');
    $currentYear = date('Y');
    
    // Calculate the academic year based on the current date (November to November)
    if ($currentMonth < 11) {
        $academicYear = ($currentYear - 1) . '/' . $currentYear;
    } else {
        $academicYear = $currentYear . '/' . ($currentYear + 1);
    }
    
    // Iterate through each user to calculate the years enrolled
    foreach ($users as $user) {
        // Calculate the number of years enrolled based on the starting year and the current year
        $yearStarted = $user->year_started;
        
        // If the current month is before November, reduce the current year by 1
        if ($currentMonth < 11) {
            $currentYear--;
        }
        
        // Calculate the number of years enrolled from November to November
        $yearsEnrolled = $currentYear - $yearStarted;

        // If the current month is November or later, increment yearsEnrolled by 1
        if ($currentMonth >= 11) {
            $yearsEnrolled++;
        }

        // Format the years enrolled (e.g., 2020/2021)
        $yearEnrolledFormat = $yearStarted . '/' . ($yearStarted + 1);
        
        // Assign the calculated values to the user object
        $user->years_enrolled = $yearsEnrolled;
        $user->year_enrolled_format = $yearEnrolledFormat;
        
        // Assign the academic year to each user
        $user->academic_year = $academicYear;
    }
        
        // Return the view with the users data
        return view('wahumini')->with('users', $users);
        
    }
    public function create()
    {
        return view('members.create');
    }

    public function storeM(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'position' => 'required|string',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
        ]);
    
        $imageName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('images'), $imageName);
    
        $imagePath = 'images/' . $imageName;
    
        $member = new Management();
        $member->full_name = $request->full_name;
        $member->position = $request->position;
        $member->picture = $imagePath; // Store the image path in the database
        $member->facebook = $request->facebook;
        $member->instagram = $request->instagram;
    
        $member->save();
    
        return redirect()->back()->with('success', 'Member created successfully');
    }
   
    public function getAllMembers()
{
    $members = Management::all();

    return view('leaders', compact('members'));
}

public function createEvent()
    {
        return view('events');
    }

    public function storeEvent(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        $imageName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('images'), $imageName);

        $event = new Event();
        $event->event_name = $request->event_name;
        $event->picture = $imageName;
        $event->description = $request->description;
        $event->save();

        return redirect()->back()->with('success', 'Event created successfully');
    }
    public function getEvents()
    {
        // Retrieve all events
        $events = Event::all();
    
        return view('view_events', compact('events'));
    }
}
