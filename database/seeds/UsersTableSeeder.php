<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create an admin
        App\User::create([
            'name' => 'Jon Snow',
            'password' => Hash::make('password'),
            'email' => 'jonsnow@castleblack.com',
        ]);
        
        factory(App\User::class, 5)->create();
    }
}
