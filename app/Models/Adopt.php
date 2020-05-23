<?php namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use App\Models\Enums\AdoptStat;
use Illuminate\Support\Str;

class Adopt extends Model
{
    public $table = 'adopt';
    protected $primaryKey = 'adoptId';
    protected $attributes = ['stat' => 'A', 'birthday'=>'', 'breed'=>'Cross Breed'];
    public $timestamps = false;
    //protected $dates = ['birthday'];
    protected $appends = ['age'];

    public static function getFeaturedAdopts($rand)
    {
        return Adopt::where('stat', AdoptStat::Available)
      ->orderByRaw("rand(".$rand.")")->limit(4)->get();
    }
  
    public function saveAdopt($input)
    {
        $this->name = $input['name'];
        $this->stat = $input['stat'];
        $this->slug = Str::slug($this->name);
        $this->gender = $input['gender'];
        $this->birthday = Carbon::createFromFormat('Y-m-d', $input['birthday']);
        $this->breed = $input['breed'];
        $this->colour = $input['colour'] ?? "";
        $this->microchip = $input['microchip'] ?? 0;
        $this->vaccinate = $input['vaccinate'] ?? 0;
        $this->sterilise = $input['sterilise'] ?? 0;
        $this->hdb = $input['hdb'] ?? 0;
        $this->desc = $input['desc'] ?? "";
        $this->health = $input['health'] ?? "";
        $this->behaviour = $input['behaviour'] ?? "";
        $this->history = $input['history'] ?? "";
        if ($this->adoptId == null) {
            $this->image = "";
        }
        $this->save();
        return $this->adoptId;
    }
  
    public function getAgeAttribute()
    {
        $date = new DateTime($this->birthday);
        $diff = $date->diff(new DateTime());
        $age = '';
        if ($diff->y > 0) {
            $age .= $diff->y;
            if ($diff->y>1) {
                $age.=' yrs ';
            } else {
                $age.=' yr ';
            }
        }
        if ($diff->m > 0) {
            $age.=$diff->m;
            if ($diff->m>1) {
                $age.=' mths';
            } else {
                $age.=' mth';
            }
        }
        return $age;
    }
}
