<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        if($this->method()  == 'POST'){

            return [
                'name' => 'required' ,
                'email' => 'required|email|unique:users,email',
                'img' => 'required|mimes:png,jpg,jpeg' ,
                'password' => 'required' ,
            ];  
        } 
        else {
                    
            return [
                'name' => 'required' ,
                'email' => 'required|email',
                'img' => 'nullable|mimes:png,jpg,jpeg' ,
            ];
        }
    }
}
