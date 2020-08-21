<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class GenreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];

        if($this->getMethod() === "POST"){
            $rules += ['name' => 'required|string|max:255|unique:genres,name'];
        }
        else{
            $rules += ['name' => 'required|string|max:255|unique:genres,name,'.$this->artist->id];
        }
        
        return $rules;
    }
}
