<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array 
    {
        return [
            'invoice_number'         => $this->method() == "POST" ? 'required|unique:invoices,invoice_number' : 'required|unique:invoices,invoice_number,'.$this->id,
            'invoice_Date' => 'required',
            'section_id' => 'required',
            'product_id' => 'required',
            'plate_price' => 'required|numeric|min:0',
            'number_of_people' => 'required|integer|min:1',
            'discount' => 'required',
            'total' => 'required',
        ];
    }
}
