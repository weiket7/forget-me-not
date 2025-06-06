<?php namespace App\Http\Controllers;

use App\Http\Requests\AdoptRequest;
use App\Models\Adopt;
use App\Models\Enums\AdoptStat;
use App\Helpers\BackendHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;

class AdoptController extends Controller
{
    public function save(AdoptRequest $request, $adoptId = null)
    {
        $adopt = new Adopt();
        if ($adoptId) {
            $adopt = Adopt::find($request->get('adoptId'));
        }
        $adoptId = $adopt->saveAdopt($request->all());
        return $adoptId;
    }
  
    public function index(Request $request)
    {
        $data['adopts'] = Adopt::all();
        $data['adopt_stats'] = AdoptStat::$values;
        return $data;
    }
  
    public function get(Request $request, $adoptId)
    {
        $adopt = Adopt::where('adoptId', $adoptId)->first();
        $data['adopt'] = $adopt;
        return $data;
    }
    
    public function uploadVideo(Request $request)
    {
        $nameWithExtension = $request->video->getClientOriginalName();
        $nameWithoutExtension = explode('.', $nameWithExtension)[0];
      
        $videoName = BackendHelper::uploadVideo($nameWithoutExtension, $request->video);
        $data['uploaded'] = 1;
        $data['url'] = url('/') . '/videos/'.$videoName;
        $data['name'] = $videoName;

        $adopt = Adopt::find($request->adoptId);
        $adopt->video = $videoName;
        $adopt->save();
        return $data;
    }
    
    public function deleteVideo(Request $request)
    {
        $adopt = Adopt::find($request->adoptId);
        $adopt->video = null;
        $adopt->save();
    }
    
    public function uploadImage(Request $request)
    {
        $nameWithExtension = $request->image->getClientOriginalName();
        $nameWithoutExtension = explode('.', $nameWithExtension)[0];
      
        $imageName = BackendHelper::uploadImage('adopts', $nameWithoutExtension, $request->image);
        $data['uploaded'] = 1;
        $data['url'] = url('/') . '/images/adopts/'.$imageName;

        $adopt = Adopt::find($request->adoptId);
        $adopt['image'.$request->imageNumber] = $imageName;
        $adopt->save();
        return $data;
    }
    
    public function deleteImage(Request $request)
    {
        $adopt = Adopt::find($request->adoptId);
        $adopt['image'.$request->imageNumber] = null;
        $adopt->save();
    }
}
