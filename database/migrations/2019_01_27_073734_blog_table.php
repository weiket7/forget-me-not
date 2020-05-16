<?php

use App\Models\Enums\BlogType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class BlogTable extends Migration
{
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('blogId');
            $table->char('type', 1);
            $table->string('title', 150);
            $table->string('slug', 150);
            $table->string('image', 100);
            $table->boolean('isFeatured')->default(0);
            $table->text('shortDesc');
            $table->text('content');
            $table->dateTime('postedOn');
        });
   
        DB::table('blog')->insert([
            'isFeatured'=>1,
            'type'=>'N',
            'title'=>'Fundraising Merchandise - 2020',
            'slug'=>'fundraising-merchandise-2020',
            'image'=>'merch1.jpg',
            'shortDesc'=>'"Yes, I am a dog lover.
            Just cos life is too short to miss out REAL true love."
            Does this caption speak your heart like how it speak of ours?
            So… (Drums rolling🥁🥁🥁) today, we are presenting our long awaited FMN Version 3.0 tee-shirt to pass the heartfelt message!
            Together with our group of dedicated volunteers, we have designed our very own #HYPEBEAST inspired tee.
            Your support in the purchase of the tee is very crucial to us, to help us tide through this difficult period. The COVID-19 outbreak has not only impacted the economy badly, but has also hit us negatively, both operationally and financially.
            ',
            'content'=>'"Yes, I am a dog lover.
Just cos life is too short to miss out REAL true love."
Does this caption speak your heart like how it speak of ours?
So… (Drums rolling🥁🥁🥁) today, we are presenting our long awaited FMN Version 3.0 tee-shirt to pass the heartfelt message!
Together with our group of dedicated volunteers, we have designed our very own #HYPEBEAST inspired tee.
Your support in the purchase of the tee is very crucial to us, to help us tide through this difficult period. The COVID-19 outbreak has not only impacted the economy badly, but has also hit us negatively, both operationally and financially.
We have not been able to partake in any adoption events since the beginning of the year, while facing visitors’ restrictions at the shelter for social responsibility reasons. This means lesser opportunities for our furkids to see their potential adopters. We look towards continuing to provide and caring for our existing furkids the best we can but it is definitely not without financial stress.
Your purchase will aid us in our March’s rental and expenses towards the livelihood of 40 dogs in and outside of shelter. We thank you in advance for even considering to tide us through this difficult period.
            ',
            'postedOn'=>Carbon::now(),
        ]);
        
        DB::table('blog')->insert([
            'type'=>'N',
            'title'=>'Rusty',
            'slug'=>'rusty',
            'image'=>'rusty.png',
            'shortDesc'=>'Our role here is solely focused on the wellness of Rusty.',
            'content'=>'Our role here is solely focused on the wellness of Rusty.',
            'postedOn'=>Carbon::now(),
        ]);
        
        DB::table('blog')->insert([
            'type'=>'N',
            'title'=>'Lola with her incredible Mommies',
            'slug'=>'lola-with-her-incredible-mommies',
            'image'=>'lola.png',
            'shortDesc'=>'',
            'content'=>'',
            'postedOn'=>Carbon::now(),
        ]);
    }
  
    public function down()
    {
        Schema::dropIfExists('blog');
    }
}
