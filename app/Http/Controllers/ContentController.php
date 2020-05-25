<?php namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function get(Request $request, $page)
    {
        return Content::where('page', $page)->pluck('content', 'key');
    }

    public function save(Request $request, $page)
    {
        DB::table('content')->where('page', $page)->where('key', 'title')->update([
            'content'=>$request->title
        ]);
        DB::table('content')->where('page', $page)->where('key', 'content')->update([
            'content'=>$request->content
        ]);
    }
}
