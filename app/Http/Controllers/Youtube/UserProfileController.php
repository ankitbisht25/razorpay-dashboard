<?php

namespace App\Http\Controllers\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Youtube\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $profiles = UserProfile::latest('id')->get();
        return view('youtube.profile.list', compact('profiles'));
    }

    public function create()
    {
        return view('youtube.profile.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'channel_name' => 'required|string|max:255',
            'subscribers' => 'required',
            'views' => 'required',
            'profile_logo' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('profile_logo')) {
            $path = $request->file('profile_logo')->store('youtube/profile_logo', 'public');
            $validated['profile_logo'] = $path;
        }

        UserProfile::create($validated);
        return redirect()->back()->with('success', 'Profile created successfully.');
    }

    public function show($id)
    {
        $profile = UserProfile::find($id);
        return view('youtube.profile.create', compact('profile'));
    }

    public function edit($id)
    {
        $profile = UserProfile::find($id);
        return view('youtube.profile.create', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'channel_name' => 'required|string|max:255',
            'subscribers' => 'required',
            'views' => 'required',
            'profile_logo' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('profile_logo')) {
            $path = $request->file('profile_logo')->store('youtube/profile_logo', 'public');
            $validated['profile_logo'] = $path;
        }
        $userProfile = UserProfile::findOrFail($id);

        $userProfile->update($validated);
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function destroy($id)
    {
        $userProfile = UserProfile::findOrFail($id);
        if ($userProfile->profile_logo) {
            \Storage::disk('public')->delete($userProfile->profile_logo);
        }

        $userProfile->delete();
        return redirect()->back()->with('success', 'Profile deleted successfully.');
    }
}
