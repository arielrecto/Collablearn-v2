<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Guild;
use App\Models\Project;
use App\Models\ProjectTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::latest()->latest()->paginate(10);

        return  view('users.student.project.index',  compact(['projects']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $guilds = Guild::get();

        return view('users.student.project.create', compact(['guilds']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'max_users' => 'required',
            'type' => 'required'
        ]);



        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' =>  Auth::user()->id,
            'is_public' => $request->visibility  == 'true',
            'type' => $request->type,
            'max_user' => $request->max_users
        ]);


        if ($request->guild) {
            $project->update([
                'guild_id' => $request->guild
            ]);
        }

        if ($request->hasFile('image')) {
            $imageName = 'GLD-' . uniqid() . '.' . $request->image->extension();
            $dir = $request->image->storeAs('/project/', $imageName, 'public');


            $project->update([
                'image' =>  asset('/storage/' . $dir),
            ]);
        }



        return back()->with(['success_message' => 'Project Created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);


        return view('users.student.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function tasks(string $id)
    {

        $project = Project::find($id);

        $tasks = $project->projectTasks;
        return view('users.student.project.task.index', compact('project', 'tasks'));
    }

    public function createTask(string $id)
    {
        $project = Project::find($id);

        return view('users.student.project.task.create', compact(['project']));
    }

    public function storeTask(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'due_date' => 'required'
        ]);


        ProjectTask::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'assign_id' => $request->assign_to,
            'created_by' => Auth::user()->id,
            'project_id' => $request->project,
        ]);


        return back()->with(['success_message' => 'Task Added!']);
    }
}
