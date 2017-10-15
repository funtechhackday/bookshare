<?php

use Bookshare\Models\Author;
use Bookshare\Models\Genre;
use Bookshare\Models\Book;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Bookshare\User;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::dropIfExists('books');
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('desc');
            $table->string('image');
            $table->integer('authorId')->nullable();
            $table->integer('genreId')->nullable();
            $table->integer('userId')->nullable();
            $table->boolean('available')->nullable();
            $table->timestamps();
        });

        factory(Book::class, DatabaseSeeder::COUNT)->create()->each(function (Book $u) {
            $u->author()->associate(Author::inRandomOrder()->first())->save();
            $u->genre()->associate(Genre::inRandomOrder()->first())->save();
            $u->user()->associate(User::inRandomOrder()->first())->save();
        });
    }
}
