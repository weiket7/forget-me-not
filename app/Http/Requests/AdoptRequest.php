<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdoptRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
          'name' => 'required',
          'stat' => 'required',
          'gender' => 'required',
          'birthday' => 'required',
          'breed' => 'required',
          'imageNew' => 'required_without:adoptId|mimes:jpeg,png,gif|max:1024',
        ];
    }
  
    public function messages()
    {
        return [
          'name.required' => 'Name is required',
          'stat.required' => 'Status is required',
          'gender.required' => 'Gender is required',
          'birthday.required' => 'Birthday is required',
          'breed.required' => 'Breed is required',
          'imageNew.required_without' => 'Image is required',
          'imageNew.mimes' => 'Image must be jpg, png or gif',
          'imageNew.max' => 'Image must be less than 1mb size',
        ];
    }
}
