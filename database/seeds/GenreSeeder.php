<?php

use Bookshare\Models\Genre;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::dropIfExists('genres');
        Schema::create('genres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });

        factory(Genre::class, DatabaseSeeder::COUNT)->create();
    }
}
