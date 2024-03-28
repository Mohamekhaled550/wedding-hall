<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'facebook' => 'required',
            'twitter'  => 'required',
            'youtube'  => 'required',
            'phone'    => 'required',
            'whatsapp' => 'required',
            'location' => 'required',
            'gmail'    => 'required',
            'email'    => 'required',
        ];
    }
}
