<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Guild;
use App\Models\Project;
use App\Enums\UserTypes;
use App\Models\ProjectTask;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ProjectParticipant;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::latest()->latest()->paginate(12);

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


        ProjectParticipant::create([
            'user_id' => Auth::user()->id,
            'project_id' => $project->id
        ]);



        return back()->with(['success_message' => 'Project Created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);

        $percentTotalTasks = $project->percentCompletedTasks();

        $taskCounts = $project->projectTasks()
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');


        $today = Carbon::today();


        $overdueTasks = $project->projectTasks()->where('due_date', '<', $today)
            ->where('status', '!=', 'completed')
            ->get();


        $upcomingTasks = $project->projectTasks()
            ->where('start_date', '<', $today)
            ->where('status', '!=', 'completed')
            ->get();


        $todayTasks = $project->projectTasks()
            ->where('start_date', $today)
            ->where('status', '!=', 'completed')
            ->get();




        return view('users.student.project.show', compact([
            'project',
            'percentTotalTasks',
            'taskCounts',
            'overdueTasks',
            'upcomingTasks',
            'todayTasks'
        ]));
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

        $tasks = $project->projectTasks()->paginate(10);
        return view('users.student.project.task.index', compact('project', 'tasks'));
    }

    public function createTask(string $id)
    {
        $project = Project::find($id);


        $participants = $project->projectParticipants;
        return view('users.student.project.task.create', compact(['project', 'participants']));
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

    public function updateStatusTask(string $id, Request $request)
    {
        $projectTask = ProjectTask::find($id);


        $projectTask->update([
            'status' => $request->status
        ]);


        return back()->with([
            'success_message' => 'project Status Updated!'
        ]);
    }

    public function participantIndex(string $id)
    {
        $project = Project::find($id);

        $nonParticipants = User::role(UserTypes::STUDENT->value)->whereDoesntHave('projectAsParticipants')->get();


        $participants = $project->projectParticipants;


        return view('users.student.project.participant.index', compact(['participants', 'project', 'nonParticipants']));
    }
    public function addParticipant(Request $request)
    {
        $request->validate([
            'participant' => 'required'
        ]);


        ProjectParticipant::create([
            'project_id' => $request->projectID,
            'user_id' => $request->participant
        ]);


        return back()->with(['success_message' => 'Participant Added!']);
    }
    public function myProject()
    {

        $query = Project::where('user_id', Auth::user()->id)
            ->orWhereHas('projectParticipants', function ($q) {
                $q->where('user_id', Auth::user()->id);
            });

        $projects = $query->latest()->latest()->paginate(12);

        return  view('users.student.project.index',  compact(['projects']));
    }
}
