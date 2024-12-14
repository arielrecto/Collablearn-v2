<?php

namespace App\Http\Controllers\Student;

use App\Models\Guild;
use Ramsey\Uuid\Guid\Guid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guilds = Guild::where('is_public', true)
            ->latest()->paginate(10);

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


        return back()->with(['success_message' => 'Guild Created Success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guild = Guild::find($id);


        return view('users.student.guild.show', compact(['guild']));
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
}
