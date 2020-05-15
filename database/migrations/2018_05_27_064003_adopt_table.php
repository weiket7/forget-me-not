<?php

use App\Models\Enums\AdoptStat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdoptTable extends Migration
{
    public function up()
    {
        Schema::create('adopt', function (Blueprint $table) {
            $table->increments('adoptId');
            $table->char('stat', 1);
            $table->string('name', 50);
            $table->string('slug', 50);
            $table->char('gender', 1);
            $table->date('birthday');
            $table->string('breed', 50);
            $table->string('colour', 20)->nullable();
            $table->boolean('microchip')->nullable();
            $table->boolean('vaccinate')->nullable();
            $table->boolean('sterilise')->nullable();
            $table->boolean('hdb');
            $table->string('image', 100);
            $table->string('health', 500)->nullable();
            $table->string('behaviour', 500)->nullable();
            $table->string('history', 2000)->nullable();
            $table->string('desc', 2000)->nullable();
        });

        DB::table('adopt')->insert([
          'stat'=>AdoptStat::Available,
          'name'=>'Alpha',
          'slug'=>'alpha',
          'gender'=>'M',
          'birthday'=>'2020-01-01',
          'breed'=>'Cross Breed',
          'hdb'=>1,
          'image'=>'alpha.png',
          'desc'=>"The loyal fluff is the rarest gem. Just like the royal flush. He values you (& his wife Buffy) more than anything else. He's the greatest companion one could ever have.",
        ]);

        DB::table('adopt')->insert([
          'stat'=>AdoptStat::Available,
          'name'=>'Bravo',
          'slug'=>'bravo',
          'gender'=>'M',
          'birthday'=>'2020-01-01',
          'breed'=>'Cross Breed',
          'hdb'=>1,
          'image'=>'bravo.png',
          'desc'=>"The loyal fluff is the rarest gem. Just like the royal flush. He values you (& his wife Buffy) more than anything else. He's the greatest companion one could ever have.",
        ]);

        DB::table('adopt')->insert([
          'stat'=>AdoptStat::Available,
          'name'=>'Charlie',
          'slug'=>'charlie',
          'gender'=>'M',
          'birthday'=>'2020-01-01',
          'breed'=>'Cross Breed',
          'hdb'=>1,
          'image'=>'charlie.png',
          'desc'=>"The loyal fluff is the rarest gem. Just like the royal flush. He values you (& his wife Buffy) more than anything else. He's the greatest companion one could ever have.",
        ]);

        DB::table('adopt')->insert([
          'stat'=>AdoptStat::Available,
          'name'=>'Delta',
          'slug'=>'delta',
          'gender'=>'F',
          'birthday'=>'2020-01-01',
          'breed'=>'Cross Breed',
          'hdb'=>1,
          'image'=>'delta.png',
          'desc'=>"The loyal fluff is the rarest gem. Just like the royal flush. He values you (& his wife Buffy) more than anything else. He's the greatest companion one could ever have.",
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('adopt');
    }
}
