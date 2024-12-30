<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Enums\UserTypes;
use App\Models\Guild;
use App\Models\Profile;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory(20)->withProfile()->create();

        $roles = UserTypes::cases();

        collect($roles)->map(function ($role) {
            Role::create([
                'name' => $role
            ]);
        });


        $studentRole = Role::where('name', UserTypes::STUDENT->value)->first();

        $adminRole = Role::where('name', UserTypes::ADMIN->value)->first();


        $student = User::create([
            'name' => 'student',
            'lrn' => '123',
            'email' => 'student@student.com',
            'password' => Hash::make('ariel123'),
        ]);



        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('ariel123'),
        ]);


        $student->assignRole($studentRole);
        $admin->assignRole($adminRole);

        Profile::factory()->create([
            'user_id' => $student->id
        ]);


        $users = User::whereDoesntHave('roles')->get();

        collect($users)->map(function ($user) use ($studentRole) {
            $user->assignRole($studentRole);
        });

        $students = User::role(UserTypes::STUDENT->value)->get();

        collect($students)->map(function ($student){
            Guild::factory()->withMembers()->create([
                'user_id' => $student->id
            ]);

            Project::factory()->withParticipantsAndTasks()->create([
                'user_id' => $student->id
            ]);
        });
        // Guild::factory(10)->withMembers()->create();
        // Project::factory(10)->withParticipantsAndTasks()->create();
    }
}
