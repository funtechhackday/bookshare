<?php

use Bookshare\Models\Book;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;

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
            $table->integer('authorId')->nullable();
            $table->timestamps();
        });

        factory(Book::class, DatabaseSeeder::COUNT)->create()->each(function (Book $u) {
            $u->author()->associate(\Bookshare\Models\Author::inRandomOrder()->first())->save();
        });
    }
}
