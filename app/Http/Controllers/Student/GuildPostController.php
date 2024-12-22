<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\GuildPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuildPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'guild' => 'required'
        ]);

        GuildPost::create([
            'content' => $request->content,
            'guild_id' => $request->guild,
            'user_id' => Auth::user()->id
        ]);

        return back()->with(['success_message' => 'Post Added Successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guildPost = GuildPost::find($id);

        return view('users.student.guild.guild-post.show', compact(['guildPost']));
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
