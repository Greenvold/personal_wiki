<?php

use App\Group;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user1 = User::create([
            'name' => 'Rudolf Bruder',
            'email' => 'rudolf.bruder@gmail.com',
            'password' => Hash::make('password')
        ]);

        $user2 = User::create([
            'name' => 'Dasa Bruderova',
            'email' => 'dasa.bruderova@gmail.com',
            'password' => Hash::make('password')
        ]);

        $user3 = User::create([
            'name' => 'Gabriel Vadkerti',
            'email' => 'gabriel.vadkerti@gmail.com',
            'password' => Hash::make('password')
        ]);


        $group1 = Group::create([
            'title' => 'Teacher',
            'description' => 'Group for teachers.'
        ]);

        $user1->groups()->attach($group1);
    }
}