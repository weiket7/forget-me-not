<?php namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function get(Request $request, $page)
    {
        return Content::where('page', $page)->pluck('content', 'key');
    }
}
