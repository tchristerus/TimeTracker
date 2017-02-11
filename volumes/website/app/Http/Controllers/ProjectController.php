<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\AddProjectRequest;
use App\Project;
use Illuminate\Http\Request;
use Auth;
use View;

class ProjectController extends Controller
{

    public function getProjects (){
        $user = Auth::getUser();
        $projects = $user->projects;

        return View::make('dashboard')->with([
            'user' => $user,
            'projects' => $projects
        ]);
    }

    public function addProject (AddProjectRequest $req){
        $project = new Project();
        $project->userId = Auth::getUser()->id;
        $project->name = $req->name;
        $project->description = $req->description;


        if($project->save()){
            return redirect('/dashboard');
        }

        return response('Something went wrong', 500);
    }

    public function removeProject(Request $req){
        $user = Auth::getUser();
        $project = Project::find($req->id);
        if ($project == null) {

        }

        if ($user->projects->contains($project)){
            $project->delete();
        }

        return redirect('/dashboard');
    }
}
