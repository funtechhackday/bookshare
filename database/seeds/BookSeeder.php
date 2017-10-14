<?php

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
        Schema::create('books', function (Blueprint $table) {
            $table->primary('id');
            $table->string('title');
            $table->integer('authorId')->nullable();
        });
    }
}
