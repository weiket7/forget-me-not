<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  public $table = 'setting';
  protected $primaryKey = 'setting_id';
  public $timestamps = false;
  
  public static function getMainEmail() {
    return Setting::where('key', 'mainEmail')->value('value');
  }
  
  public static function getAdoptionFormRecipients($adopter_email) {
    $mainEmail = $adopter_email;
    if ($adopter_email != "wei_ket@hotmail.com") {
      $mainEmail .= ',' . self::getMainEmail();
      $mainEmail .= ',' . str_replace(' ', '', Setting::where('key', 'adoption_form_recipients')->value('value'));
    }
    return explode(',', $mainEmail);
  }
  
  public static function getVolunteerFormArcRecipients() {
    $value = Setting::where('key', 'volunteer_form_arc_recipients')->value('value');
    return str_replace(' ', '', $value);
  }
  
}