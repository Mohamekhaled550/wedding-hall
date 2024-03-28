<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    } 

    
    public function rules(): array
    {
        return [
            'name'         => $this->method() == "POST" ? 'required|unique:products,name' : 'required|unique:products,name,'.$this->id,
            'description'  => 'required',
            'img'         => $this->method() == "POST" ? 'required|mimes:png,jpg,jpeg' : 'nullable|mimes:png,jpg,jpeg' ,

        ];
    }
}
