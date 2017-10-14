<?php

use Bookshare\Models\Book;
use Bookshare\Models\BookRate;
use Bookshare\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;

class BookRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::dropIfExists('book_rates');
        Schema::create('book_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bookId')->nullable();
            $table->integer('userId')->nullable();
            $table->enum('rate', [1,2,3,4,5]);
            $table->timestamps();
        });

        factory(BookRate::class, DatabaseSeeder::COUNT)->create()->each(function (BookRate $u) {
            $u->book()->associate(Book::inRandomOrder()->first())->save();
            $u->user()->associate(User::inRandomOrder()->first())->save();
        });
    }
}
