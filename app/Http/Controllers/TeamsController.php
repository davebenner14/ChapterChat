<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function show(Request $request, Team $team)
    {
        // Add your logic to fetch additional data for the team
        // For example, you can fetch the team members:
        $teamMembers = $team->users;

        return view('teams.show', compact('team', 'teamMembers'));
    }
}