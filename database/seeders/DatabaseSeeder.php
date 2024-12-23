<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Enums\UserTypes;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

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
    }
}
