<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $user = User::create([
             'name' => 'Super Admin',
             'email' => 'admin@memelords.lol',
             'username' => 'admin',
             'email_verified_at' => now(),
             'password' => Hash::make('maliksonneli'),
             'remember_token' => Str::random(10),
         ]);

        Permission::create(['name' => 'access dashboard']);

        $user->givePermissionTo('access dashboard');
    }
}
