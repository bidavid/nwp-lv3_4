<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{

    public function fetchProjectsForUser(Request $request){
        $logged_user_id = $request->user()->id;
        $logged_user = User::findOrFail($logged_user_id);

        $owned_projects = Project::where('owner_id', $logged_user_id)->get();
        $assigned_projects = $logged_user->projects()->get();
        return view('dashboard', ['owned_projects' => $owned_projects, 'assigned_projects' => $assigned_projects]);
    }

    public function createProject(Request $request) {

        $project = new Project;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->price = $request->price;
        $project->completed_tasks = $request->completed_tasks;
        $project->started_at = $request->started_at;
        $project->finished_at = $request->finished_at;
        $project->owner_id = $request->user()->id;

        $project->save();

        return redirect('dashboard');
    }

    public function fetchOtherUsers(Request $request) {
        $project_id = $request->project_id;
        $users = User::where('id', '!=', $request->user()->id)->get();
        
        return view('assign-member', ['users' => $users, 'project_id' => $project_id]);
    }

    public function performAssign(Request $request) {
        $selected_user_id = $request->selected_user_id;
        $selected_project_id = $request->selected_project_id;

        $project = Project::findOrFail($selected_project_id);
        $user = User::findOrFail($selected_user_id);

        $project->users()->attach($user);

        return redirect('dashboard');
    }

    
}
