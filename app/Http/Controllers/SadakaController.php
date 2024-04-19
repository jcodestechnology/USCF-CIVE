<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sadaka;
use App\Models\Ahadi;
use App\Models\User;
use App\Models\AhadiKapu;
use App\Models\Expense;
use App\Models\KamatiMapato;
use App\Models\ProjectIncome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Import DB facade
use PDF;
use Carbon\Carbon;

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
            'sadaka_madhabahu' => 'nullable|string',
            'katikati_week' => 'nullable|string',
            'risiti' => 'nullable', // Validation rules for the PDF receipt
        ]);
    
      
    
        $sadaka = new Sadaka();
        $sadaka->date = $validatedData['date'];
        $sadaka->sadaka_jumapili = $validatedData['sadaka_jumapili'];
        $sadaka->kumtunza_mchungaji = $validatedData['kumtunza_mchungaji'];
        $sadaka->mnada = $validatedData['mnada'];
        $sadaka->shukrani_ya_pekee = $validatedData['shukrani_ya_pekee'];
        $sadaka->changizo = $validatedData['changizo'];
        $sadaka->sadaka_madhabahu = $validatedData['sadaka_madhabahu'];
        $sadaka->katikati_week = $validatedData['katikati_week'];
        $sadaka->risiti = $validatedData['risiti']; // Assign the path to the 'risiti' field
    
      // Handle file upload
      if ($request->hasFile('risiti')) {
        $file = $request->file('risiti');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('risiti', $filename);
        $validatedData['risiti'] = $path;
    }
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
    // Validate request data
    $validatedData = $request->validate([
        'aina_ya_sadaka' => 'required|string',
        'ahadi_yangu' => 'required|numeric|min:100000',
    ], [
        'ahadi_yangu.min' => 'Ahadi ya Mwaka must start from laki moja (100,000).',
    ]);

    // Check if Ahadi already exists for the user in the current year
    $existingAhadi = Ahadi::where('user_id', Auth::id())
                           ->where('aina_ya_sadaka', $validatedData['aina_ya_sadaka'])
                           ->where('year', date('Y'))
                           ->first();

    if ($existingAhadi) {
        return redirect()->back()->with('error', 'Samahani, umekwisha weka ahadi yako ya matoleo kwa mwaka huu.');
    }

    // Create and save new Ahadi
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
           
            'tarehe_ya_jumapili' =>'required|date',
        ]);
    
        // Find the Ahadi record for the selected user
        $ahadi = Ahadi::where('user_id', $validatedData['mhumini'])->first();
    
        // Update the kiasi_alichotoa field by adding the new value to the existing value
        if ($ahadi) {
            $existingAmount = $ahadi->kiasi_alichotoa ?? 0; // Get the existing amount or default to 0 if not set
            $newAmount = $validatedData['kiasi_alichotoa'];
            $totalAmount = $existingAmount + $newAmount;
            $ahadi->kiasi_alichotoa = $totalAmount;
            $ahadi->tarehe_ya_jumapili =$validatedData['tarehe_ya_jumapili'];
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
    
        // Retrieve ahadi updates history for the authenticated user, including the updated amount and the date it was updated
        $ahadiUpdates = $user->ahadiUpdates()->select('created_at', 'kiasi_alichotoa')->get();
    
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
    
        // Format the date in each ahadi update record
        $formattedUpdates = $ahadiUpdates->map(function ($update) {
            return [
                'created_at' => $update->created_at ? $update->created_at->format('Y-m-d H:i:s') : null,
                'kiasi_alichotoa' => $update->kiasi_alichotoa,
            ];
        });
    
        // Return the view with user's details, Ahadi records, and ahadi updates history
        return view('view_my_ahadi', ['user' => $userData, 'ahadis' => $ahadis, 'ahadiUpdates' => $formattedUpdates]);
    }
    
    

    public function ahadiKapu(Request $request)
{
    $validatedData = $request->validate([
        'kiasi_alichotoa' => 'required|string', // Validate the input
        'tarehe_ya_jumapili'=>'required|date',
    ]);

    AhadiKapu::create($validatedData);

    return redirect()->back()->with('success', 'Sadaka imejazwa kikamilifu.');
}

public function matumizi(Request $request)
    {
        $request->validate([
            'expense_date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Expense::create($request->all());

        return redirect()->back()->with('success', 'Matumizi yamenakiliwa kikamilifu.');
    }

    public function generateReport(Request $request)
    {
        $reportType = $request->input('report_type');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        if ($reportType === 'income') {
            // Generate income report
     // Retrieve income (sadaka) records for the specified date range
     $income = Sadaka::whereBetween('date', [$startDate, $endDate])->get();
     // Calculate total income
     $totalIncome = $income->sum('sadaka_jumapili') + $income->sum('kumtunza_mchungaji') + $income->sum('mnada') + $income->sum('shukrani_ya_pekee') + $income->sum('changizo') + $income->sum('sadaka_madhabahu') + $income->sum('katikati_week');
            // Retrieve income records for each committee/group
            $committeeIncome = [];
            $allCommittees = KamatiMapato::distinct()->pluck('aina_ya_mapato');
            foreach ($allCommittees as $committee) {
                $committeeIncome[$committee] = KamatiMapato::where('aina_ya_mapato', $committee)
                    ->whereBetween('tarehe', [$startDate, $endDate])
                    ->get();
            }
    
            // Retrieve project income records
            $projectIncome = ProjectIncome::whereBetween('date', [$startDate, $endDate])->get();
    
            // Load the income report view with data
            $pdf = PDF::loadView('pdf.income_report', compact('income','committeeIncome', 'projectIncome', 'startDate', 'endDate'));
    
            // Return the PDF response
            return $pdf->stream('income_report.pdf');
        } elseif ($reportType === 'expenses') {
              // Generate expenses report
        // Retrieve expenses records for the specified date range
        $expenses = Expense::whereBetween('expense_date', [$startDate, $endDate])->get();
        // Calculate total expenses
        $totalExpenses = $expenses->sum('amount');
        // Generate PDF for expenses report
        $pdf = PDF::loadView('pdf.expenses_report', compact('expenses', 'startDate', 'endDate', 'totalExpenses'));
        
        
            // Return the PDF response
            return $pdf->stream('expenses_report.pdf');
        } elseif ($reportType === 'income_expenses') {
            // Generate combined income and expenses report
            // Retrieve income and expenses records for the specified date range
            $income = Sadaka::whereBetween('date', [$startDate, $endDate])->get();
            $expenses = Expense::whereBetween('expense_date', [$startDate, $endDate])->get();
            // Calculate total income and total expenses
            $totalIncome = $income->sum('sadaka_jumapili') + $income->sum('kumtunza_mchungaji') + $income->sum('mnada') + $income->sum('shukrani_ya_pekee') + $income->sum('changizo') + $income->sum('sadaka_madhabahu') + $income->sum('katikati_week');
            $totalExpenses = $expenses->sum('amount');

             // Retrieve income records for each committee/group
             $committeeIncome = [];
             $allCommittees = KamatiMapato::distinct()->pluck('aina_ya_mapato');
             foreach ($allCommittees as $committee) {
                 $committeeIncome[$committee] = KamatiMapato::where('aina_ya_mapato', $committee)
                     ->whereBetween('tarehe', [$startDate, $endDate])
                     ->get();
             }
     
             // Retrieve project income records
             $projectIncome = ProjectIncome::whereBetween('date', [$startDate, $endDate])->get();
            // Generate PDF for combined report
            $pdf = PDF::loadView('pdf.combined_report', compact('income','committeeIncome', 'expenses','projectIncome', 'startDate', 'endDate', 'totalIncome', 'totalExpenses'));
            
            // Return the PDF response
            return $pdf->stream('combined_report.pdf');
        } else {
            // Invalid report type
            return response()->json(['error' => 'Invalid report type'], 400);
        }
    }
    
    
    public function mapato_mengineyo(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'tarehe' => 'required|date',
        'aina_ya_mapato' => 'required|string',
        'kiasi_cha_mapato' => 'required|numeric',
        'risiti' => 'required|file|mimes:pdf|max:2048', // adjust max file size as needed
    ]);

    // Upload the file
    $path = $request->file('risiti')->store('risiti');

    // Create a new KamatiMapato instance
    $kamatiMapato = new KamatiMapato([
        'tarehe' => $validatedData['tarehe'],
        'aina_ya_mapato' => $validatedData['aina_ya_mapato'],
        'kiasi_cha_mapato' => $validatedData['kiasi_cha_mapato'],
        'risiti' => $path,
    ]);

    // Save the KamatiMapato instance
    $kamatiMapato->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Mapato yamefanikiwa kunakiliwa kikamilifu.');
}
public function mradi(Request $request)
    {
        $request->validate([
            'tarehe' => 'required|date',
            'jina_la_mradi' => 'required|string',
            'gharama_kwa_bidhaa' => 'required|numeric',
            'idadi_ya_bidhaa' => 'required|integer',
            'risiti' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Calculate total cost
        $totalCost = $request->gharama_kwa_bidhaa * $request->idadi_ya_bidhaa;

        // Save the data to the database
        $projectIncome = new ProjectIncome();
        $projectIncome->date = $request->tarehe;
        $projectIncome->project_name = $request->jina_la_mradi;
        $projectIncome->cost_per_item = $request->gharama_kwa_bidhaa;
        $projectIncome->quantity = $request->idadi_ya_bidhaa;
        $projectIncome->total_cost = $totalCost;
        
        // Handle receipt upload
        if ($request->hasFile('risiti')) {
            $file = $request->file('risiti');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('receipts'), $fileName);
            $projectIncome->receipt_path = 'receipts/' . $fileName;
        }

        $projectIncome->save();

        return redirect()->back()->with('success', 'Mapato ya mradi yamehifadhiwa kikamilifu.');
    }
}
