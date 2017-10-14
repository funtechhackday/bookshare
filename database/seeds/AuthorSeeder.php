<?php

use Bookshare\Models\Author;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::dropIfExists('authors');
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->timestamps();
        });

        factory(Author::class, DatabaseSeeder::COUNT)->create();
    }
}
