<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class SettingTable extends Migration
{
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->increments('settingId');
            $table->string('key', 50);
            $table->string('value', 500);
        });
  
        DB::table('setting')->insert([
          'key'=>'mainEmail',
          'value'=>'fmndogshelter@gmail.com',
        ]);
    }
  
    public function down()
    {
        Schema::dropIfExists('setting');
    }
}
