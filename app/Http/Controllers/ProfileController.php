<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $profileData = $user->profile;
    
        // Check if the profile data is available
        if (!$profileData) {
            // You can add some fallback data or handle the case when the profile data is missing
            $profileData = (object) [
                'bio' => 'No bio available',
                'location' => 'No location available',
            ];
        }
    
        return view('profile.show', compact('user', 'profileData'));
    }
    
    
}