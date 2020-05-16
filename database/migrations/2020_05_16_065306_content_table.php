<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ContentTable extends Migration
{
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->increments('contentId');
            $table->string('name', 50);
            $table->string('key', 50);
            $table->text('content');
            $table->string('page', 50)->nullable();
        });

        DB::table("content")->insert([
            'name'=>'Main Email',
            'key'=>'mainEmail',
            'content'=>'fmndogshelter@gmail.com',
            'page'=>'home'
        ]);

        DB::table("content")->insert([
            'name'=>'Content',
            'key'=>'content',
            'content'=>'About Us content',
            'page'=>'aboutUs'
        ]);

        DB::table("content")->insert([
            'name'=>'Content',
            'key'=>'content',
            'content'=>'Sponsor content',
            'page'=>'sponsor'
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('content');
    }
}
