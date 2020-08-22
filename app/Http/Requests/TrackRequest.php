<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrackRequest extends FormRequest
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
        $rules = [
            'year' => 'integer|required',            
            'album' =>'integer|required|exists:albums,id',
            'genre' =>'integer|required|exists:genres,id',
            'number' => 'integer|required',
            'title' => 'required|string|max:255|title'
        ];
        
        return $rules;
    }
}
