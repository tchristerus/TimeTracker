<?php

namespace App\Http\Controllers;

use App\Team;
use App\TeamMember;
use Illuminate\Http\Request;
use View;

class TeamController extends Controller
{
    public function getTeams(){
        $user = \Auth::getUser();
        $teams = Team::where('ownerId', '=', $user->id)->get();



        return View::make('teams')->with([
            'teams' => $teams,
            'user' => \Auth::getUser()
        ]);
    }

    public function getMembers(Request $req){
        $user = \Auth::getUser();
        //$members = TeamMember::where('teamId', '=', $req->id)->get();
        $members = Team::find($req->id);

        

//        return View::make('sections/members')->with([
//           'members' => $members
//        ]);
    }
}
