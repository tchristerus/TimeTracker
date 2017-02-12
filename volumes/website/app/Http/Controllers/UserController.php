<?php

namespace App\Http\Controllers;

use App\Http\Requests\JoinTeamRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Use this functino to create an account
     *
     * @param RegisterRequest $req
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $req)
    {
        $user = new User();
        $user->forename = ucfirst($req->forename);
        $user->surname = ucfirst($req->surname);
        $user->gender = $req->gender;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);

        if ($user->save()) {
            $authenticated = Auth::attempt([
                'email' => $req->email,
                'password' => $req->password
            ]);

            if ($authenticated) {
                return redirect('/dashboard')->with(
                    [
                        'registered' => "You have successfully registered and have been logged in automatically."
                    ]);
            }
        } else {
            return redirect('/register')->with(
                [
                    'register_error' => "Something went wrong while registering. This may be an internal problem."
                ]);
        }
    }

    /**
     * Used this function to authenticate users
     *
     * @param LoginRequest $req
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function authenticate(LoginRequest $req)
    {
        $authenticated = Auth::attempt([
            'email' => $req->email,
            'password' => $req->password
        ], $req->remember_me);

        if ($authenticated) {
            return redirect('/dashboard');
        }

        return redirect('/login')->with(
            [
                'login_error' => "Something went wrong while logging in. This may be an internal problem."
            ]);
    }

    /**
     * Use this function to join a team
     *
     * @param JoinTeamRequest $req
     */
    //TODO safety! and returning errors like user does not exist
    public function joinTeam(JoinTeamRequest $req)
    {
        $user = User::where('email', '=', $req->email)->first();
        if ($user) {
            $team = Team::find($req->teamId);

            if ($team) {
                if($team->ownerId != Auth::getUser()->id){
                    // not owning the project.
                    return 'You do not own this project';
                }
                if($team->users()->save($user)){
                    return redirect('/dashboard/teams');
                }
            }
        }
    }
}
