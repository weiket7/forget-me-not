<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactTable extends Migration
{
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->increments('contact_id');
            $table->string('name', 50);
            $table->string('email', 100);
            $table->string('mobile', 50);
            $table->string('subject', 50)->nullable();
            $table->string('message', 500);
            $table->dateTime('sentOn');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact');
    }
}
