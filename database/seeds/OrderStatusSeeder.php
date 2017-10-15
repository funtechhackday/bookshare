<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Bookshare\Models\OrderStatus;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::dropIfExists('order_statuses');
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('title')->nullable();
            $table->string('desc')->nullable();
            $table->boolean('available')->nullable();
        });

        $Order = new OrderStatus();
        $Order->title = 'На рассмотрении';
        $Order->desc = 'Я сам еще почитать хочу!';
        $Order->available = true;
        $Order->save();

        $Order = new OrderStatus();
        $Order->title = 'Возвращена';
        $Order->desc = 'Спасибо что вернули <3';
        $Order->available = true;
        $Order->save();

        $Order = new OrderStatus();
        $Order->title = 'Не возвращена';
        $Order->desc = 'Надежда умирает последней';
        $Order->available = false;
        $Order->save();

        $Order = new OrderStatus();
        $Order->title = 'Чтение';
        $Order->desc = 'И не слоупок я!';
        $Order->available = false;
        $Order->save();

        $Order = new OrderStatus();
        $Order->title = 'Резерв';
        $Order->desc = 'Наглость - второе счастье :)';
        $Order->available = false;
        $Order->save();

        $Order = new OrderStatus();
        $Order->title = 'Отказ';
        $Order->desc = 'Моя прелесть (с)Голум';
        $Order->available = false;
        $Order->save();

    }
}
