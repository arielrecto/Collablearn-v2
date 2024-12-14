<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\UserTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function  index()
    {
        $role = User::find(Auth::user()->id)->roles()->first();

        switch ($role->name) {
            case UserTypes::ADMIN->value:
                return to_route('admin.dashboard');
                break;
            case UserTypes::STUDENT->value:
                return to_route('student.dashboard');
                break;
            default:
                Auth::logout();
                return redirect('/');
                break;
        }
    }
}
