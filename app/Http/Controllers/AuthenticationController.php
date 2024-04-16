<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('username', 'password');
    
        // Determine whether username is email or phone
        $field = filter_var($credentials['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    
        if (Auth::attempt([$field => $credentials['username'], 'password' => $credentials['password']])) {
            // Authentication was successful
            $user = Auth::user(); // Get the authenticated user
    
            // Check if the user is active
            if ($user->status === 'Active') {
                // Check user's role
                if ($user->user_role === 'Member') {
                    return redirect()->intended('dashboard')->with('success', 'Login successful.'); // Redirect to member dashboard
                } else {
                    return redirect()->intended('leaderdashboard')->with('success', 'Login successful.'); // Redirect to leader dashboard
                }
            } else {
                Auth::logout(); // Log out the user
                return back()->with('error', 'Your account is inactive. You are no longer a member of USCF CIVE.'); // Redirect back with inactive account message
            }
        } else {
            // Authentication failed
            return back()->with('error', 'Invalid credentials. Please try again.');
        }
    }
    

    public function logout(Request $request)
    {
        Auth::guard('web')->logout(); // Logout the user from the 'web' guard
        session()->invalidate(); // Invalidate the current session
        session()->regenerateToken(); // Regenerate the CSRF token

        return redirect()->route('login'); // Redirect to home or any other route after logout
    }

    public function getAuthenticatedUserDetails()
    {
        // Assuming you have a User model
        $user = Auth::user();
        
       
        
        return $user;
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully!');
    }
}
