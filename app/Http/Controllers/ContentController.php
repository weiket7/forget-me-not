<?php namespace App\Http\Controllers;

use App\Helpers\BackendHelper;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    public function get(Request $request, $page)
    {
        return Content::where('page', $page)->pluck('content', 'key');
    }

    public function save(Request $request, $page)
    {
        if ($request->imageNew) {
            $imageName = $page;
            $imageName = BackendHelper::uploadImage("", $imageName, $request->imageNew);
            DB::table('content')->where('page', $page)->where('key', 'image')->update([
                'content'=>$imageName
            ]);
        }
        DB::table('content')->where('page', $page)->where('key', 'content')->update([
            'content'=>$request->content
        ]);
    }
}
