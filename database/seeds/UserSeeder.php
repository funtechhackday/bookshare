<?php

use Bookshare\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $user = new User();
        $user->setRawAttributes([
            'name' => 'Vassiliy Ivanovich',
            'email' => 'user@email.net',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
        ]);
        $user->save();
        factory(User::class, DatabaseSeeder::COUNT)->create();
    }
}
