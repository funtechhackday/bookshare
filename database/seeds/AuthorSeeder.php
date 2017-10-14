<?php

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
        Schema::create('authors', function (Blueprint $table) {
            $table->primary('id');
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
        });
    }
}
