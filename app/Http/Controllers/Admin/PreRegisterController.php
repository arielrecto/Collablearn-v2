<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PreRegister;
use App\Notifications\EmailVerifiedToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PreRegisterController extends Controller
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
        return view('pre-register.step-one');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
        ]);

        $preRegister = PreRegister::create([
            'email' => $request->email,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'step' => 2,
            'status' => 'pending',
            'email_token' => substr(str_shuffle('0123456789'), 0, 6),
        ]);

        $preRegister->notify(
            new EmailVerifiedToken([
                'email' => $preRegister->email,
                'token' => $preRegister->email_token,
                'id' => $preRegister->id,
            ]),
        );

        return to_route('pre-register.step-two.create', ['pre_register' => $preRegister->id]);
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

    public function stepTwo(string $id)
    {
        $preRegister = PreRegister::find($id);

        return view('pre-register.step-two', compact(['preRegister']));
    }
    public function stepTwoStore(string $id, Request $request)
    {
        $preRegister = PreRegister::find($id);

        $token = implode('', json_decode($request->token));
        if ($preRegister->email_token !== $token) {
            return back()->withErrors(['token' => 'Incorrect Token']);
        }

        $preRegister->update([
            'email_verified_at' => now(),
            'step' => $preRegister->step + 1,
        ]);

        return to_route('pre-register.step-three.create', ['pre_register' => $preRegister->id]);
    }
    public function stepThree(string $id)
    {
        $preRegister = PreRegister::find($id);

        return view('pre-register.step-three', compact(['preRegister']));
    }
    public function stepThreeStore(string $id, Request $request)
    {
        $preRegister = PreRegister::find($id);

        $request->validate([
            'lrn' => 'required',
            'password' => 'required|confirmed',
        ]);

        $preRegister->update([
            'lrn' => $request->lrn,
            'password' => $request->password,
            'step' => $preRegister->step + 1,
        ]);

        return to_route('pre-register.step-four.create', ['pre_register' => $preRegister->id]);
    }
    public function stepFour(string $id)
    {
        $preRegister = PreRegister::find($id);
        return view('pre-register.step-four', compact(['preRegister']));
    }
    public function stepFourStore(string $id, Request $request)
    {
        $preRegister = PreRegister::find($id);

        $base64Image = json_decode($request->image)->image;

        if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $matches)) {
            $fileExtension = $matches[1]; // Get the image extension (e.g., png, jpeg)
            $base64Image = substr($base64Image, strpos($base64Image, ',') + 1); // Remove the prefix
            $base64Image = base64_decode($base64Image); // Decode the image

            // Generate a unique filename
            $fileName = uniqid() . '.' . $fileExtension;

            // Save the file to the storage/app/public/images directory
            $filePath = 'images/' . $fileName;
            Storage::disk('public')->put($filePath, $base64Image);
        }

        $preRegister->update([
            'photo' =>  asset('storage/' . $filePath),
            'step' => $preRegister->step + 1
        ]);

        return to_route('pre-register.step-five.create', ['pre_register' => $preRegister->id]);
    }
    public function stepFive(string $id)
    {
        $preRegister = PreRegister::find($id);
        return view('pre-register.step-five', compact(['preRegister']));
    }

}
