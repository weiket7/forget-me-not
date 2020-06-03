<?php namespace App\Models\Enums;

abstract class BlogType
{
    const News = 'N';
    const Events = 'E';
    const SuccessStories = 'S';
  
    public static $values = array(
    self::News=>'News',
    self::Events=>'Events',
    self::SuccessStories=>'Success Stories',
  );
}
