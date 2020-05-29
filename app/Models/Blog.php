<?php namespace App\Models;

use App\Helpers\BackendHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Str;

class Blog extends Model
{
    public $table = 'blog';
    protected $primaryKey = 'blogId';
    public $timestamps = false;

    public static function get($count = 4)
    {
        return Blog::orderBy('postedOn', 'desc')->paginate($count);
    }
    
    public static function getFeaturedPost()
    {
        $post = DB::table("blog")->where('isFeatured', '=', 1)->first();
        if (is_null($post)) {
            return DB::table("blog")->orderBy('postedOn', 'desc')->take(1)->first();
        }
        return $post;
    }

    public static function getLatestPosts()
    {
        return DB::table("blog")->orderBy('postedOn', 'desc')->take(3)->get();
    }

    public function saveBlog($input)
    {
        $this->title = $input['title'];
        $this->slug = Str::slug($this->title);
        $this->type = $input['type'];
        if ($this->blogId == null) {
            $this->image = "";
            $this->postedOn = Carbon::now();
        }
        $this->isFeatured = $input['isFeatured'];
        $this->shortDesc = $input['shortDesc'];
        $this->content = $input['content'];
        $this->save();

        return $this->blogId;
    }
}
