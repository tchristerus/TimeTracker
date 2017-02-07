<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(RegisterRequest $req){
        $user = new User();
        $user->forename = ucfirst($req->forename);
        $user->surname = ucfirst($req->surname);
        $user->gender = $req->gender;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);

        if($user->save()){
            $authenticated = Auth::attempt([
                'email' => $req->email,
                'password' => $req->password
            ]);

            if($authenticated){
                return redirect('/dashboard')->with(
                    [
                        'registered' => "You have successfully registered and have been logged in automatically."
                    ]);
            }
        }else{
            return redirect('/register')->with(
                [
                    'register_error' => "Something went wrong while registering. This may be an internal problem."
                ]);
        }
    }

    public function authenticate(LoginRequest $request){
        $authenticated = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ],$request->remember_me);

        if($authenticated){
            return redirect('/dashboard');
        }

        return redirect('/login')->with(
            [
                'login_error' => "Something went wrong while logging in. This may be an internal problem."
            ]);
    }

}
