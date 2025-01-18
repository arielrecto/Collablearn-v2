<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {

        $user =  auth()->user();
        $profile = $user->profile;

        return view('users.student.profile.edit', compact(['user', 'profile']));
    }

    public function updatePassword(Request $request)
    {
        return view('users.student.profile.password');
    }

    public function update(Request $request)
    {
        $authUser = auth()->user();

        $user = User::find($authUser->id);




        $user->update([
            'email' => $request->email ?? $user->email
        ]);

        $profile = $user->profile;

        $profile->update([
            'last_name' => $request->last_name ?? $profile->last_name,
            'first_name' => $request->first_name ?? $profile->first_name,
        ]);

        if ($request->hasFile('image')) {
            $imageName = 'GLD-' . uniqid() . '.' . $request->image->extension();
            $dir = $request->image->storeAs('/avatar/', $imageName, 'public');


            $profile->update([
                'avatar' =>  asset('/storage/' . $dir),
            ]);
        }

        if ($request->password) {


            if (!Hash::check($request->current_password, $user->password)) {
                return back()->with(['error_message' => 'Current Password is incorrect']);
            }


            $request->validate([
                'password' => 'confirmed'
            ]);



            $user->update([
                'password' => Hash::make($request->password) ?? $user->password
            ]);
        }



        return back()->with(['success_message' => 'Personal Information updated Success']);
    }
}
