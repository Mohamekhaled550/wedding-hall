<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'name'         => 'required|unique:sections,name',
            'description'  => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'يرجى إدخال اسم القسم',
            'name.unique'   => 'هذا الاسم مستخدم بالفعل، يرجى استخدام اسم آخر',
            'description.required' => 'يرجى إدخال الوصف للقسم',
        ];
    }
}
