<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Models\LearningModule;
use App\Http\Controllers\Controller;

class LearningModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $learningModules = LearningModule::latest()->paginate(12);

        return view('users.student.learning-modules.index', compact('learningModules'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $learningModule = LearningModule::findOrFail($id);


        return view('users.student.learning-modules.show', compact('learningModule'));
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
