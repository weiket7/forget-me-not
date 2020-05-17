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
            'name'=>'',
            'key'=>'content',
            'content'=>'Today, despite the gloomy skies, we received warm sunshine from the volunteers who came to us! With more hands and legs today, more of our pooches were out of their kennels for their sunbathing!

            We want to thank the new faces today. Thank you for your precious time on a Sunday, strolling the furries and giving them a showering good time. We hope we had also taken the opportunity to let you see the beautiful side of these little animals we love so much.
            
            To have made this happened, we want to show appreciation to Audrey for organizing it up so well with us. Woof-you!',
            'page'=>'about'
        ]);
        DB::table("content")->insert([
            'name'=>'',
            'key'=>'image',
            'content'=>'group.jpg',
            'page'=>'about'
        ]);


        DB::table("content")->insert([
            'name'=>'',
            'key'=>'image',
            'content'=>'sponsor-feb-2020.jpg',
            'page'=>'sponsor'
        ]);
        DB::table("content")->insert([
            'name'=>'',
            'key'=>'title',
            'content'=>'Sponsor-A-Dog FEBRUARY\'20 update.',
            'page'=>'sponsor'
        ]);
        DB::table("content")->insert([
            'name'=>'Content',
            'key'=>'content',
            'content'=>'• Once again, our Brownie Boy managed to charm his way to another heart. He is very fortunate to have another superhero coming forward to sponsor him for the month. 🐾
            
            • Our very sweet princess Violet made her first stand forward and joined some of her fur-buddies to be partially sponsored.
            
            • This month is the final month of Buzz’s sponsorship program, so he is now on a mission in search for his new superhero! With the newly revised size criteria for Project Adore, Buzz is now HDB APPROVED!🥳 Calling all HDB owners who love big dogs, Buzz Buzz Maybe?
            
            • Saving the best for the last! Bali is FINALLY adopted! We are extremely delighted that he has a home of his own, after waiting for 8 long years! We cannot express our thanks enough to his superheroes for having his back all these while. ❤ Woof-you Nova & Maya! ❤
            
            We managed to gather all our superdoggos in this update. More than half of them are still looking for their superhero. Before they are rehome-able, they need shelter and food. They need time to learn how to trust again. Sadly, time is money.😭😭
            
            Even though these dogs were born at the wrong place, they too deserve to live and be loved. You can make a difference in the lives of others. Be a doer - don\'t only be a hearer. To us and to our doggos, doers are true heroes⚡. These doggos need you. Are you a hero?
            
            All you need to do is PM us:
            • The dog you would like to sponsor
            • The amount - $50 / $100 / $150 / $200 / $250
            • The duration of sponsorship - 1 /3 / 6 / 9 / 12 months / infinity
            
            For sponsorships in other amounts / duration, feel free to reach out to us!
            
            For more information on Sponsor-A-Dog:
            https://www.facebook.com/1710154292620566/posts/2241349379501052/
            
            Our Super-doggos list below!
            
            1) Fufu
            https://bit.ly/37Axqgd
            2) Buffy
            https://bit.ly/35kCMKI
            3) Alfa
            https://bit.ly/2uG2j4C
            4) Brownie Boy
            https://bit.ly/2OSaO2D
            5) Snoopy
            https://bit.ly/2wZq3S5
            6) Katniss
            https://bit.ly/2OQi9jo
            7) Buzz
            8) Bali
            9) Mandy
            10) Marco
            11) Mario
            12) Ashley
            13) Woodina
            14) Indigo
            15) Violet
            16) Nikki
            17) Duke
            18) JayLin',
            'page'=>'sponsor'
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('content');
    }
}
