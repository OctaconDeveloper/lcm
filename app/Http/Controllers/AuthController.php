<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rank' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'role' => 'required|string',
        ]);
        $password = password_generator();
        $data = $request->only(['firstname', 'lastname', 'email', 'role','rank']);
        $data['password'] = Hash::make($password);
        $data['status'] = 'active';

        User::create($data);
        activityLogger(auth()->user(), "Created new {$request->role} account for {$request->email}");
        $message = "New account created <br/> Email: {$request->email} <br/> Password: {$password}";
        return redirect()->back()->with('msg', $message);
    }

    public function assignUser(Request $request)
    {
        $request->validate([
            'user' => 'required|string',
            'unit' => 'required|string'
        ]);

        $user = User::find($request->user);
        $unit = Unit::find($request->unit);
        $user->update([
            'unit_id' => $unit->id
        ]);

        activityLogger(auth()->user(), "Assigned {$user->firstname} to {$unit->name} unit");
        $message = "Admin {$user->firstname} assigned to {$unit->name} successfully.";
        return redirect()->back()->with('msg', $message);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = User::whereEmail($request->email)->first();
            if ($user->status == 'active') {
                activityLogger($user, "Logged in");
                return redirect('/dashboard');
            } else if ($user->status == 'inactive') {
                $error = "Account is not active";
                return redirect('/')->withErrors([$error]);
            } else {
                $error = "Account is not verified";
                return redirect('/')->withErrors([$error]);
            }
        }
        $error = "Invalid Login Credentials";
        return redirect('/')->withErrors([$error]);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        activityLogger($user, "Logged out");
        Auth::logout();
        return redirect('/');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string'
        ]);

        $user = User::whereEmail($request->email)->first();
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname
        ]);

        activityLogger(auth()->user(), "update profile information for {$user->email}");

        return redirect()->back()->with('msg', "Profile updated successfully.");
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::find(auth()->user()->id);
        if (Auth::attempt(['email' => $user->email, 'password' => $request->old_password])) {

            $user->update([
                'password' => Hash::make($request->password)
            ]);

            activityLogger($user, "update password");

            return redirect()->back()->with('msg', "Password updated successfully.");
        }
        return redirect()->back()->withErrors(['Incorrect old  password']);
    }

    public function changeStatus(Request $request, string $user_id)
    {
        $userId = decrypt_data($user_id);
        $user = User::find($userId);
        if (!$user) {
            return redirect()->back()->withErrors(["No admin record found"]);
        }
        $newStatus = $user->status == 'active' ? 'inactive' : 'active';
        $newStatusComment = $user->status == 'active' ? 'deactivated' : 'activated';
        $user->update([
            'status' => $newStatus
        ]);
        activityLogger(auth()->user(), "Created {$newStatusComment} account for {$user->email}");
        return redirect()->back()->with('msg', "Account {$newStatusComment}  successfully.");
    }

    public function delete(Request $request, string $user_id)
    {
        $userId = decrypt_data($user_id);
        $user = User::find($userId);
        if (!$user) {
            return redirect()->back()->withErrors(["No admin record found"]);
        }
        $user->delete();
        activityLogger(auth()->user(), "Deleted account for {$user->email}");
        return redirect()->back()->with('msg', "Account deleted successfully.");
    }
}
