<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeamRequest;
use App\Http\Requests\GetMembersRequest;
use App\Team;
use App\TeamMember;
use Illuminate\Http\Request;
use View;

class TeamController extends Controller
{
    public function getTeams()
    {
        $user = \Auth::getUser();
        $ownTeams = Team::where('ownerId', '=', $user->id)->get();

        $joinedTeams = $user->teams->where('ownerId', '!=', $user->id);


        return View::make('teams')->with([
            'ownTeams' => $ownTeams,
            'joinedTeams' => $joinedTeams,
            'user' => \Auth::getUser()
        ]);
    }

    public function getMembers(GetMembersRequest $req)
    {
        $user = \Auth::getUser();
        //$members = TeamMember::where('teamId', '=', $req->id)->get();
        $team = Team::find($req->id);

        if ($team == null)
            return "";

        $users = $team->users;

        return View::make('sections/teams/members')->with([
            'users' => $users
        ]);
    }

    public function createTeam(CreateTeamRequest $req)
    {
        $user = \Auth::getUser();

        $team = new Team();
        $team->ownerId = $user->id;
        $team->name = $req->name;
        $team->description = $req->description;

        if ($team->save()) {
            return \Redirect('/dashboard/teams')->with([
                'team_created_id' => $team->id
            ]);
        }

        return \Redirect('/dashboard/teams')
            ->withInput()
            ->withErrors([
                'team_creation_failed' => 'Something went wrong while creating the new team. Please try again later.'
            ]);
    }
}
