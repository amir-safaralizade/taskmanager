<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cart;
use App\Models\Task;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(10)->create();

         User::factory()->create([
             'name' => 'Amirreza Safaralizade',
             'email' => 'sfr@gmail.com',
             'password' => Hash::make('123456'),
             'role' => 'admin',
             'email_verified_at' => now(),
             'created_at' => now(),
             'updated_at' => now(),
             'remember_token' => Str::random(10),
         ]);


         $count = rand(0 , 6);
         Cart::factory(4)->has(Task::factory()->count($count))->create();
    }
}
