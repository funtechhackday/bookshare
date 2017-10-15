<?php

use Bookshare\Models\Book;
use Bookshare\Models\Order;
use Bookshare\User;
use Bookshare\Models\OrderStatus;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::dropIfExists('orders');
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ownerId')->nullable();
            $table->integer('bookId')->nullable();
            $table->integer('receiverId')->nullable();
            $table->dateTime('returnDate')->nullable();
            $table->string('comment');
            $table->integer('statusId')->nullable();
            $table->timestamps();
        });

        factory(Order::class, DatabaseSeeder::COUNT)->create()->each(function (Order $u) {
            $u->owner()->associate(User::inRandomOrder()->first())->save();
            $u->receiver()->associate(User::inRandomOrder()->first())->save();
            $u->book()->associate(Book::inRandomOrder()->first())->save();
            $u->status()->associate(OrderStatus::inRandomOrder()->first())->save();
        });
    }
}
