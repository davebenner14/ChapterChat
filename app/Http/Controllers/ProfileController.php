<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $profileData = $user->profile ?? (object) [
            'bio' => 'No bio available',
            'location' => 'No location available',
        ];

        $books = $user->books; // Assuming you have defined the relationship correctly
        $reviews = $user->reviews; // Assuming you have defined the relationship correctly

        return view('profile.show', compact('user', 'profileData', 'books', 'reviews'));
    }

    public function edit()
    {
        $user = auth()->user();
        $profileData = $user->profile ?? (object) [
            'bio' => 'No bio available',
            'location' => 'No location available',
        ];

        return view('profile.edit', compact('user', 'profileData'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'location' => 'nullable|string|max:255',
        ]);

        // Update the user's profile data
        $user->update([
            'name' => $validatedData['name'],
        ]);

        // Update the profile data if available
        if ($user->profile) {
            $user->profile->update([
                'bio' => $validatedData['bio'],
                'location' => $validatedData['location'],
            ]);
        }

        // Update the profileData variable with the updated data
        $profileData = (object) [
            'bio' => $validatedData['bio'] ?? 'No bio available',
            'location' => $validatedData['location'] ?? 'No location available',
        ];

        $books = $user->books; // Assuming you have defined the relationship correctly
        $reviews = $user->reviews; // Assuming you have defined the relationship correctly

        return view('profile.show', compact('user', 'profileData', 'books', 'reviews'));
    }
}