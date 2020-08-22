<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'birthday' => 'required|date|date_format:Y-m-d',            
            'password' => 'nullable|string|min:6|confirmed',
        ];

        if($this->getMethod() === "POST"){
            $rules += [ 'email' => 'required|string|email|max:255|unique:users'];
        }
        else{
            $rules += ['email' => 'required|string|email|max:255|unique:users,id,'.$this->user->id];
        }
        
        return $rules;
    }
}
