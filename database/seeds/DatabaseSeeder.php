<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    const COUNT = 100;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(BookSeeder::class);
        //$this->call(BookRateSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(OrderSeeder::class);
    }
}
