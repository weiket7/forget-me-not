<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
        'title' => 'required',
        'type' => 'required',
        'shortDesc' => 'required',
        'imageNew' => 'required_without:blogId',
      ];
    }
  
    public function messages()
    {
        return [
        'title.required' => 'Title is required',
        'type.required' => 'Type is required',
        'shortDesc.required' => 'Short Description is required',
        'imageNew.required_without' => 'Image is required',
      ];
    }
}
