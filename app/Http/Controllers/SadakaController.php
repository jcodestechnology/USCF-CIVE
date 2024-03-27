<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sadaka;
use App\Models\Ahadi;
use App\Models\User;
use App\Models\AhadiKapu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Import DB facade
class SadakaController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'sadaka_jumapili' => 'required|string',
            'kumtunza_mchungaji' => 'nullable|string',
            'mnada' => 'nullable|string',
            'shukrani_ya_pekee' => 'nullable|string',
            'changizo' => 'nullable|string',
        ]);

        $sadaka = new Sadaka();
        $sadaka->date = $validatedData['date'];
        $sadaka->sadaka_jumapili = $validatedData['sadaka_jumapili'];
        $sadaka->kumtunza_mchungaji = $validatedData['kumtunza_mchungaji'];
        $sadaka->mnada = $validatedData['mnada'];
        $sadaka->shukrani_ya_pekee = $validatedData['shukrani_ya_pekee'];
        $sadaka->changizo = $validatedData['changizo'];
        $sadaka->save();

        return redirect()->back()->with('success', 'Sadaka added successfully.');
    }
    public function retrieveAllSadaka()
{
    // Retrieve all Sadaka records
    $sadakas = Sadaka::all();

    // Do something with the retrieved data, for example, return or store them
    return view('view_matoleo_yote', ['sadakas' => $sadakas]);
}


    public function storeSadaka(Request $request)
    {
        $validatedData = $request->validate([
            'aina_ya_sadaka' => 'required|string',
            'ahadi_yangu' => 'required|numeric|min:100000',
        ], [
            'ahadi_yangu.min' => 'Ahadi ya Mwaka must start from laki moja (100,000).',
        ]);

        $ahadi = new Ahadi();
        $ahadi->user_id = Auth::id();
        $ahadi->aina_ya_sadaka = $validatedData['aina_ya_sadaka'];
        $ahadi->ahadi_yangu = $validatedData['ahadi_yangu'];
        $ahadi->year = date('Y'); // Include the current year
        $ahadi->save();

        return redirect()->back()->with('success', 'Ahadi added successfully.');
    }

    public function retrieveUsersWithAhadi()
    {
        // Retrieve users who have saved their Ahadi along with their Ahadi amounts
        $users = User::join('ahadis', 'users.id', '=', 'ahadis.user_id')
                        ->select('users.id', DB::raw("CONCAT(users.firstname, ' ', users.middlename, ' ', users.lastname) AS full_name"), 'ahadis.ahadi_yangu', 'ahadis.kiasi_alichotoa')
                        ->distinct()
                        ->get();
    
        // Do something with the users retrieved, for example, return or store them
        return $users;
    }
    
    
    public function someControllerMethod()
{
    $usersWithAhadi = $this->retrieveUsersWithAhadi();

    return view('ahadi_jaza', ['users' => $usersWithAhadi])
           ->with('users', $usersWithAhadi); // Send data to ahadi_jaza blade   
}

public function someControllerMethod2()
{
$usersWithAhadi = $this->retrieveUsersWithAhadi();

return view('view_ahadi_zote', ['users' => $usersWithAhadi]);
}

    public function updateAhadi(Request $request)
    {
        $validatedData = $request->validate([
            'mhumini' => 'required',
            'kiasi_alichotoa' => 'required|numeric',
        ]);
    
        // Find the Ahadi record for the selected user
        $ahadi = Ahadi::where('user_id', $validatedData['mhumini'])->first();
    
        // Update the kiasi_alichotoa field by adding the new value to the existing value
        if ($ahadi) {
            $existingAmount = $ahadi->kiasi_alichotoa ?? 0; // Get the existing amount or default to 0 if not set
            $newAmount = $validatedData['kiasi_alichotoa'];
            $totalAmount = $existingAmount + $newAmount;
            $ahadi->kiasi_alichotoa = $totalAmount;
            $ahadi->save();
        }
    
        return redirect()->back()->with('success', 'Kiasi Alichotoa updated successfully.');
    }

    public function retrieveMyAhadi()
    {
        // Retrieve authenticated user's details
        $user = Auth::user();
        
        // Retrieve Ahadi records for the authenticated user
        $ahadis = $user->ahadis()->select('ahadi_yangu', 'kiasi_alichotoa')->get();
    
        // Include the user's details
        $userData = [
            'firstname' => $user->firstname,
            'middlename' => $user->middlename,
            'lastname' => $user->lastname
        ];
    
        // Check if Ahadi records exist
        if ($ahadis->isEmpty()) {
            $message = "Samahani! Haujajaza Ahadi yako ya mwaka bado!." . PHP_EOL . "Tafadhali, jaza Ahadi yako ya mwaka ili uweze kutazama matoleo yako! Asante";

            return view('view_my_ahadi', compact('message'));
        }
    
        // Return the view with user's details and Ahadi records
        return view('view_my_ahadi', ['user' => $userData, 'ahadis' => $ahadis]);
    }
    

    public function ahadiKapu(Request $request)
{
    $validatedData = $request->validate([
        'kiasi_alichotoa' => 'required|string', // Validate the input
    ]);

    AhadiKapu::create($validatedData);

    return redirect()->back()->with('success', 'Sadaka imejazwa kikamilifu.');
}
    
}
