<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attachment;
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

        return view('users.admin.learning-modules.index', compact('learningModules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('users.admin.learning-modules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'attachments' => 'required|max:2048',
        ]);


        $learningModule = LearningModule::create([
            'title' => $request->title,
            'description' => $request->description,
            'posted_by' => auth()->user()->id,
        ]);


        if ($request->hasFile('attachments')) {


            foreach ($request->file('attachments') as $file) {


                $fileName = time() . '_' . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();


                $dir = $file->storeAs('/attachments/', $fileName, 'public');


                Attachment::create([
                    'file' => asset('/storage/' . $dir),
                    'name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'learning_module_id' => $learningModule->id,
                ]);
            }
        }


        return  back()->with('success_message', 'Learning Module created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $learningModule = LearningModule::findOrFail($id);


        return view('users.admin.learning-modules.show', compact('learningModule'));
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
