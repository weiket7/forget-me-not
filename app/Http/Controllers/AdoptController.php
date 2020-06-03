<?php namespace App\Http\Controllers;

use App\Http\Requests\AdoptRequest;
use App\Models\Adopt;
use App\Models\Enums\AdoptStat;
use App\Helpers\BackendHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdoptController extends Controller
{
    public function save(AdoptRequest $request, $adoptId = null)
    {
        $adopt = new Adopt();
        if ($adoptId) {
            $adopt = Adopt::find($request->get('adoptId'));
        }
        $adoptId = $adopt->saveAdopt($request->all());
        if ($request->imageNew) {
            $image_name = $adopt->slug."-".Carbon::now()->format("YmdHis");
            $image_name = BackendHelper::uploadImage("adopts", $image_name, $request->imageNew);
            $adopt->image = $image_name;
            $adopt->save();
        }
        return $adoptId;
    }
  
    public function index(Request $request)
    {
        $data['adopts'] = Adopt::all();
        $data['adopt_stats'] = AdoptStat::$values;
        return $data;
    }
  
    public function list(Request $request, $adoptIds)
    {
        return Adopt::whereIn('adoptId', explode(',', $adoptIds))->get();
    }
  
    public function filter(Request $request)
    {
        $query = Adopt::where('stat', AdoptStat::Available);
        if ($request->name) {
            $query->where('name', 'like', '%'.$request->name.'%');
        }
        if (count($request->hdb) == 1) {
            $query->where('hdb', array_first($request->hdb));
        }
        if (count($request->gender) == 1) {
            $query->where('gender', array_first($request->gender));
        }
        /*if (count($request->age) >= 1) {
          $query->where(function ($q) use ($request) {
            if (in_array("1", $request->age)) {
              $q->where('birthday', '>=', Carbon::now()->subYears(3));
            }
            if (in_array("2", $request->age)) {
              $q->orWhere('birthday', '>=', Carbon::now()->subYears(7))->where('birthday', '<', Carbon::now()->subYears(3));
            }
            if (in_array("3", $request->age)) {
              $q->orWhere('birthday', '<', Carbon::now()->subYears(7));
            }
          });
        }*/
        $rand = $request->session()->get('rand');
        $data['adopts'] = $query->orderByRaw("rand(".$rand.")")->get();
        $data['adopt_count'] = Adopt::where('stat', AdoptStat::Available)->count();
        return $data;
    }
  
    public function search(Request $request)
    {
        $term = $request->term;
        return Adopt::where('name', 'like', '%'.$term.'%')->where('stat', AdoptStat::Available)
      ->select(['adoptId as id', 'name as text'])->get();
    }
  
    public function getSingle(Request $request, $adoptId)
    {
        return Adopt::where('adoptId', $adoptId)->first();
    }
  
    public function page(Request $request, $current_page)
    {
        if (! $request->session()->get('rand')) {
            $request->session()->put('rand', rand());
        }
        $page_limit = 24;
        $offset = ($current_page-1)*$page_limit;
        $rand = $request->session()->get('rand');
        $data['adopts'] = Adopt::where('stat', AdoptStat::Available)
      ->orderByRaw("rand(".$rand.")")->skip($offset)->limit($page_limit)->get();
        $data['adopt_count'] = Adopt::where('stat', AdoptStat::Available)->count();
        $data['adopts_per_page'] = $page_limit;
        return $data;
    }
  
    public function get(Request $request, $adoptId)
    {
        $adopt = Adopt::where('adoptId', $adoptId)->first();
        $data['adopt'] = $adopt;
        return $data;
    }
  
    public function slug(Request $request, $slug)
    {
        return Adopt::where('slug', $slug)->first();
    }
}
