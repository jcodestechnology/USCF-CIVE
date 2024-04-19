<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program; // Make sure to import the Program model
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Management;
use App\Models\Event;
use App\Models\Family;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Auth;
use App\Models\Almanaki;
use Illuminate\Support\Carbon;
use App\Models\Matangazo;


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
        // Validate request data
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:12|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'user_role' => 'required|string|max:255',
            'program_id' => 'required|exists:programs,id',
            'password' => 'required|string',
            'profile' => 'nullable|string',
            'year_started' => 'required',
            'year_completion' => 'required',
            'gender' => 'required|in:male,female',
            'block' => 'required|numeric',
        ]);
    
        // Check if the user with the provided email already exists
        $existingEmailUser = User::where('email', $request->input('email'))->first();
        if ($existingEmailUser) {
            return back()->with('error', 'User with this email already exists.');
        }
    
        // Check if the user with the provided phone number already exists
        $existingPhoneUser = User::where('phone', $request->input('phone'))->first();
        if ($existingPhoneUser) {
            return back()->with('error', 'User with this phone number already exists.');
        }
    
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
    
    

    public function retrieveInactiveUsers()
{
    $users = User::where('status', 'Inactive')->get();
  
    return view('associate')->with('users', $users);
}
public function getAllUsers()
{
    // Retrieve only active users
    $users = User::where('status', 'Active')->get();

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
public function downloadPDF()
{
    // Get only active users
    $users = User::where('status', 'Active')->get();

    // Generate PDF
    $pdf = PDF::loadView('pdf.wahumini', compact('users'));

    // Download PDF
    return $pdf->download('wahumini_list.pdf');
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

public function storeEvent(Request $request)
{
    $request->validate([
        'event_name' => 'required|string',
        'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'required|string',
    ]);

    $imageName = time() . '.' . $request->picture->extension();
    $request->picture->move(public_path('images'), $imageName);

    $imagePath = 'images/' . $imageName; // Store the image path in a variable

    $event = new Event();
    $event->event_name = $request->event_name;
    $event->picture = $imagePath; // Store the image path in the database
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
  

    public function generateFamilies()
    {
        // Step 1: Retrieve Active Users
        $activeUsers = User::where('status', 'Active')->get();
        
        // Step 2: Determine Family Count
        $totalUsers = $activeUsers->count();
        $desiredFamilySize = 10; // Set desired family size to 10
        $familyCount = ceil($totalUsers / $desiredFamilySize);
        
        // Step 3: Distribute Users into Families
        $activeUsers = $activeUsers->shuffle(); // Shuffle users to randomize distribution
        $userChunks = $activeUsers->chunk($desiredFamilySize); // Ensure each chunk has 10 users
        
        // Step 4: Delete Existing Families and Related Records
        Family::query()->delete(); // Delete all rows from the families table
        DB::table('family_user')->delete(); // Delete all rows from the family_user pivot table
        
        // Reset auto-increment value of the families table to 1
        DB::statement('ALTER TABLE families AUTO_INCREMENT = 1');
        
        // Step 5: Create or Update Families
        foreach ($userChunks as $chunk) {
            // Select parents from the chunk
            $father = $chunk->first(function ($user) {
                return $user->gender === 'male'; // Select the first male user as father
            });
            
            $mother = $chunk->first(function ($user) {
                return $user->gender === 'female'; // Select the first female user as mother
            });
            
            // Check if both parents are present
            if (!$father || !$mother) {
                continue; // Skip chunk if either father or mother is missing
            }
            
            // Create a new family
            $family = new Family();
            $family->save();
            
            // Assign parents to the family
            $family->father_id = $father->id;
            $family->mother_id = $mother->id;
            $family->save();
            
            // Attach members to the family
            foreach ($chunk as $user) {
                $family->members()->attach($user->id);
            }
        }
        
        // Step 6: Retrieve Families
        $families = Family::with(['father', 'mother'])->get();
        
        // Step 7: Display Families
        if ($families->isEmpty()) {
            return redirect()->back()->with('error', 'No families were created.');
        }
        
        return redirect()->back()->with('success', 'Families generated successfully.');
    }
    
    public function myFamily()
    {
        // Retrieve the authenticated user
        $user = Auth::user();
    
        // Retrieve the authenticated user's family information
        $family = $user->families()->with(['father', 'mother', 'members'])->first();
    
        // Check if the user has family information
        if ($family !== null) {
            // Pass the family information to the view along with a flag indicating if the user has a family
            return view('my_family', [
                'family' => $family,
                'hasFamily' => true
            ]);
        } else {
            // If the user has no family, display a message
            $message = "You don't have any family information.";
            return view('my_family', [
                'message' => $message,
                'hasFamily' => false
            ]);
        }
    }
    
    
public function addMember(Request $request)
{
    // Retrieve new active users who haven't been assigned to any family
    $newUsers = User::where('status', 'Active')->whereDoesntHave('families')->get();

    // Loop through new users and assign them to families or create new families
    foreach ($newUsers as $newUser) {
        // Find families with fewer than 10 members
        $family = Family::whereHas('members', function ($query) {
            $query->havingRaw('COUNT(*) < 10');
        })->first();

        // If no family found or existing families are full, create a new family
        if (!$family) {
            $family = new Family();
            $family->save();

            // Select father and mother for the new family
            $father = $newUsers->first(function ($user) {
                return $user->gender === 'male';
            });

            $mother = $newUsers->first(function ($user) {
                return $user->gender === 'female';
            });

            // If both father and mother are available, assign them to the new family
            if ($father && $mother) {
                $family->father_id = $father->id;
                $family->mother_id = $mother->id;
                $family->save();
            }
        }

        // Attach the new user to the family
        $family->members()->attach($newUser->id);
    }

    return redirect()->back()->with('success', 'Members added to families successfully.');
}

    

    public function downloadFamiliesPDF()
    {
        // Retrieve the authenticated user
        $authenticatedUser = Auth::user();
    
        // Retrieve families with related data
        $families = Family::with(['father', 'mother', 'members'])->get();
    
        // Load the PDF view with data
        $pdf = PDF::loadView('pdf.families', compact('families', 'authenticatedUser'));
    
        // Download the PDF file
        return $pdf->download('families.pdf');
    }
    
    
    
    

    public function getFamilies()
{
    // Retrieve families from the database with father and mother details
    $families = Family::with(['father', 'mother'])->get();
    
    // Pass the families data to the view
    return view('create_family', compact('families'));
}

    
public function viewFamily(Family $family)
{
    // Retrieve the clicked family from the database with father, mother, and all member details
    $family = $family->load(['father:id,firstname,middlename,lastname,phone,year_started,year_completion,program_id', 'mother:id,firstname,middlename,lastname,phone,year_started,year_completion,program_id', 'members:id,firstname,middlename,lastname,phone,year_started,year_completion,program_id']);

    // Pass the family data to the view
    return view('view_family', compact('family'));
}

public function store_Almanaki(Request $request)
    {
        // Validate the form data
        $request->validate([
            'tarehe' => 'required|date',
            'tukio' => 'required|string',
        ]);

        // Check if the date already exists in the database
        $existingAlmanaki = Almanaki::where('tarehe', $request->tarehe)->first();
        if ($existingAlmanaki) {
            return redirect()->back()->with('error', 'Tarehe imekwisha jazwa kwenye almanaki.');
        }

        // Create a new almanaki entry
        Almanaki::create([
            'tarehe' => $request->tarehe,
            'tukio' => $request->tukio,
        ]);

        return redirect()->back()->with('success', 'Almanaki imesajiliwa vizuri.');
    }

    public function index()
    {
        $almanakis = Almanaki::orderBy('tarehe', 'asc')->get();
        return view('manage_almanaki', compact('almanakis'));
    }
    public function index2()
    {
        $almanakis = Almanaki::orderBy('tarehe', 'asc')->get();
        return view('almanaki_user', compact('almanakis'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'tarehe' => 'required|date',
        'tukio' => 'required|string',
    ]);

    // Check if the updated date already exists
    $existingAlmanaki = Almanaki::where('tarehe', $request->tarehe)
                                 ->where('id', '!=', $id) // Exclude the current entry being updated
                                 ->first();
    if ($existingAlmanaki) {
        return redirect()->back()->with('error', 'The updated date already exists in another Almanaki.');
    }

    // Proceed with updating the Almanaki entry
    $almanaki = Almanaki::findOrFail($id);
    $almanaki->update([
        'tarehe' => $request->tarehe,
        'tukio' => $request->tukio,
    ]);

    return redirect()->back()->with('success', 'Almanaki updated successfully.');
}



public function store_matangazo(Request $request)
{
    $request->validate([
        'headline' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $news = Matangazo::create([
        'headline' => $request->headline,
        'content' => $request->content,
        'expiration_date' => Carbon::now()->addDays(7), // Set expiration date 7 days from now
    ]);

    return redirect()->back()->with('success', 'News posted successfully.');
}
public function view_matangazos()
{
    // Retrieve news articles where the expiration date is in the future or null
    $news = Matangazo::where('expiration_date', '>=', now())
                     ->orWhereNull('expiration_date')
                     ->get();

    return view('news', ['news' => $news]);
}
public function view_matangazo_admin()
{
    // Retrieve news articles where the expiration date is in the future or null
    $matangazos = Matangazo::where('expiration_date', '>=', now())
                     ->orWhereNull('expiration_date')
                     ->get();

    return view('manage_matangazo', ['matangazos' => $matangazos]);
}

public function update_matangazo(Request $request, $id)
{
    $request->validate([
        'headline' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $matangazo = Matangazo::findOrFail($id);
    $matangazo->update([
        'headline' => $request->headline,
        'content' => $request->content,
    ]);

    return redirect()->back()->with('success', 'Matangazo updated successfully.');
}

    
}
