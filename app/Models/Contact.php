<?php namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $table = 'contact';
    protected $primaryKey = 'contactId';
    public $timestamps = false;
  
    public function saveContact($input)
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
