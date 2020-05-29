<?php namespace App\Http\Controllers;

use App\Helpers\BackendHelper;
use App\Http\Requests\BlogRequest;
use App\Models\Enums\BlogType;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function save(BlogRequest $request, $blogId = null)
    {
        $blog = $blogId == null ? new Blog() : Blog::find($request->blogId);
        if ($request->isFeatured) {
            DB::table("blog")->update(['isFeatured'=>0]);
        }
        $blogId = $blog->saveBlog(BackendHelper::processInput($request->all()));
        if ($request->imageNew) {
            $image_name = $blog->blogId.'-'.Str::slug($blog->title);
            $image_name = BackendHelper::uploadImage("blog", $image_name, $request->imageNew);
            $blog->image = $image_name;
            $blog->save();
        }
        return $blogId;
    }
  
    public function all(Request $request)
    {
        $data['blogs'] = Blog::orderBy('postedOn', 'desc')->get();
        $data['blog_types'] = BlogType::$values;
        return $data;
    }
  
    public function get(Request $request, $blogId)
    {
        $blog = null;
        if (is_numeric($blogId)) {
            $blog = Blog::where('blogId', $blogId)->first();
        } else {
            $slug = $blogId;
            $blog = Blog::where('slug', $slug)->first();
        }
        $data['blog'] = $blog;
        $data['blog_types'] = BlogType::$values;
        return $data;
    }
  
    public function filter(Request $request)
    {
        $query = Blog::orderBy("date", "desc");
        if (count($request->showing) == 1) {
            if ($request->showing == 'upcoming') {
                $query->where('date', '>=', Carbon::now());
            } elseif ($request->showing == 'past') {
                $query->where('date', '<', Carbon::now());
            }
        }
    
        if ($request->type) {
            $query->whereIn('type', $request->type);
        }
        $data['blogs'] = $query->get();
    
        return $data;
    }
}
