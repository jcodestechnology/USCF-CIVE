<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NenoLaWeek;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Maoni;

class NenoLaWeekController extends Controller
{
    public function store(Request $request)
    {
        $nenoLaWeek = new NenoLaWeek;
        $nenoLaWeek->kichwa = $request->input('kichwa');
        $nenoLaWeek->kifungu = $request->input('kifungu');
        $nenoLaWeek->maelezo = $request->input('maelezo');
        $nenoLaWeek->save();

        return redirect()->back()->with('success', 'Neno la wiki limefanikiwa kutumwa!');
    }
    public function manage()
{

    $allNenoLaWeek = NenoLaWeek::all();
   


    return view('manage_neno')->with('allNenoLaWeek', $allNenoLaWeek);
}
public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'kichwa' => 'required',
        'kifungu' => 'required',
        'maelezo' => 'required',
    ]);

    // Find the post by ID
    $nenoLaWeek = NenoLaWeek::findOrFail($id);

    // Update the post details
    $nenoLaWeek->kichwa = $request->input('kichwa');
    $nenoLaWeek->kifungu = $request->input('kifungu');
    $nenoLaWeek->maelezo = $request->input('maelezo');
    $nenoLaWeek->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Post details updated successfully!');
}
public function edit($id)
{
    // Retrieve the post from the database
    $nenoLaWeek = NenoLaWeek::findOrFail($id);

    // Return the edit view with the post data
    return view('editNeno', compact('nenoLaWeek'));
}
public function delete($id)
{
    try {
        // Find the post by ID
        $nenoLaWeek = NenoLaWeek::findOrFail($id);

        // Delete the post
        $nenoLaWeek->delete();

        // Redirect back with success message
        return redirect()->route('your.route.name')->with('success', 'Post deleted successfully');
    } catch (\Exception $e) {
        // If an error occurs, redirect back with error message
        return redirect()->back()->with('error', 'Failed to delete post');
    }
}

public function week()
{
    // Get the start and end dates of the current week
    $startOfWeek = Carbon::now()->startOfWeek();
    $endOfWeek = Carbon::now()->endOfWeek();

    // Retrieve posts within the current week
    $allNenoLaWeek = NenoLaWeek::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();

    return view('index')->with('allNenoLaWeek', $allNenoLaWeek);
}

public function storeIbada(Request $request)
{
    $request->validate([
        'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust validation rules as needed
        'description' => 'required|string',
    ]);

    // Handle file upload
    $imageName = time().'.'.$request->picture->extension();  
    $request->picture->move(public_path('images'), $imageName);

    // Create new post with image path
    $post = new Post();
    $post->picture = 'images/' . $imageName; // Save the path to the image
    $post->description = $request->description;
    $post->save();

    return redirect()->back()->with('success', 'Post created successfully');
}

public function getPictures()
{
    // Get the start of the current week (Sunday)
    $startOfWeek = Carbon::now()->startOfWeek();

    // Get the end of the current week (Saturday at 23:59)
    $endOfWeek = Carbon::now()->endOfWeek()->setHour(23)->setMinute(59)->setSecond(59);

    // Retrieve all posts with pictures posted between Sunday and Saturday 23:59
    $pictures = Post::whereBetween('created_at', [$startOfWeek, $endOfWeek])->select('picture')->get();

    return view('ibada', compact('pictures'));
}

public function storeMaoni(Request $request)
    {
        $request->validate([
            'maelezo' => 'required|string',
        ]);

        Maoni::create([
            'maelezo' => $request->maelezo,
        ]);

        return redirect()->back()->with('success', 'Maoni yako yametumwa kikamilifu!');
    }
    public function index()
    {
        $maoni = Maoni::all();
        return view('view_maoni', compact('maoni'));
    }
    public function destroy($id)
    {
        $maoni = Maoni::findOrFail($id);
        $maoni->delete();
        
        return redirect()->back()->with('success', 'Maoni deleted successfully.');
    }
}
