<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

            // Check user's role
            if ($user->user_role === 'Member') {
                return redirect()->intended('sites/member/dashboard')->with('success', 'Login successful.'); // Redirect to member dashboard
            } else {
                return redirect()->intended('sites/leader/dashboard')->with('success', 'Login successful.'); // Redirect to leader dashboard
            }
        } else {
            // Authentication failed
            return back()->with('error', 'Invalid credentials. Please try again.');
        }
    }
}
