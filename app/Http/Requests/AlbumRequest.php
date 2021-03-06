<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
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
            'artist' =>'integer|required|exists:artists,id'
        ];

        if($this->getMethod() === "POST"){
            $rules += ['title' => 'required|string|max:255|unique:albums,title'];
        }
        else{
            $rules += ['title' => 'required|string|max:255|unique:albums,title,'.$this->album->id];
        }
        
        return $rules;
    }
}
