<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
         $user = User::factory()->create([
             'name' => 'Super Admin',
             'email' => 'admin@memelords.app',
             'username' => 'admin'
         ]);

        Permission::create(['name' => 'access dashboard']);

        $user->givePermissionTo('access dashboard');
    }
}
