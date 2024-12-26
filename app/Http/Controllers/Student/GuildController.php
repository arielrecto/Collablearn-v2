<?php

namespace App\Http\Controllers\Student;

use App\Models\Guild;
use Ramsey\Uuid\Guid\Guid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GuildMember;
use Illuminate\Support\Facades\Auth;

class GuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $query = Guild::where('is_public', true);

        if($search){
            $query  = $query->where('name', 'like', '%' . $search . '%');
        }

        $guilds = $query->latest()->paginate(12);

        return view('users.student.guild.index', compact(['guilds']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.student.guild.create');
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
        ]);


        $guild = Guild::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_public' => $request->visibility  == 'true' ? true : false,
            'max_users' => $request->max_users,
            'user_id' => Auth::user()->id,
        ]);


        if ($request->hasFile('image')) {
            $imageName = 'GLD-' . uniqid() . '.' . $request->image->extension();
            $dir = $request->image->storeAs('/guild/', $imageName, 'public');


            $guild->update([
                'image' =>  asset('/storage/' . $dir),
            ]);
        }


        GuildMember::create([
            'guild_id' => $guild->id,
            'user_id' => Auth::user()->id,
        ]);



        return back()->with(['success_message' => 'Guild Created Success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guild = Guild::find($id);


        $guildPosts = $guild->guildPosts()->latest()->paginate(10);



        return view('users.student.guild.show', compact(['guild', 'guildPosts']));
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


    public function join(string $id)
    {

        GuildMember::create([
            'guild_id' => $id,
            'user_id' => Auth::user()->id,
        ]);

        return back()->with(['success_message' => 'Joined Guild Success']);
    }

    public function leave(string $id)
    {
        $guild = Guild::find($id);

        $guild->leaveUserGuild();


        return back()->with(['success_message' => 'Leave Guild Success']);
    }


    public function members(string $id)
    {
        $guild = Guild::find($id);


        $members = $guild->guildMembers;


        return view('users.student.guild.members.index', compact(['guild', 'members']));
    }

    public function about(string $id)
    {
        $guild = Guild::find($id);


        return view('users.student.guild.about.index', compact(['guild']));
    }


    public  function myGuild()
    {
        $query = Guild::where('user_id', Auth::user()->id)
            ->orWhereHas('guildMembers', function ($q) {
                $q->where('user_id', Auth::user()->id);
            });




        $guilds = $query->latest()->paginate(12);

        return view('users.student.guild.my-guild', compact(['guilds']));
    }
}
