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
            'Amount_Commission' => 'required',
            'discount' => 'required',
            'rate_vat' => 'required',
            'value_vat' => 'required',
            'total' => 'required',
        ];
    }
}
