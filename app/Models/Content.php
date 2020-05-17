<?php namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public $table = 'content';
    protected $primaryKey = 'contentId';
    public $timestamps = false;
  
    public function saveContent($input)
    {
        $this->name = $input['name'];
        $this->mobile = $input['mobile'];
        $this->email = $input['email'];
        $this->subject = $input['subject'];
        $this->message = $input['message'];
        $this->sentOn = Carbon::now();
        $this->save();
        return $this->contactId;
    }
}
