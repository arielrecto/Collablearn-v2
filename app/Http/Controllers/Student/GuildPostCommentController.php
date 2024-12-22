<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Models\GuildPostComment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GuildPostCommentController extends Controller
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
        $request->validate(['content' => 'required']);

        GuildPostComment::create([
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'guild_post_id' => $request->guildPost
        ]);


        return back()->with(['success_message' => 'comment posted!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
