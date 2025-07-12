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
    $rules = [
        'invoice_number'     => $this->method() == "POST"
                                ? 'required|unique:invoices,invoice_number'
                                : 'required|unique:invoices,invoice_number,'.$this->id,
        'invoice_Date'       => 'required',
        'section_id'         => 'required',
        'product_id'         => 'required',
        'plate_price'        => 'required|numeric|min:0',
        'number_of_people'   => 'required|integer|min:1',
        'discount'           => 'required|numeric|min:0',
        'total'              => 'required|numeric|min:0',
    ];

    // ✅ الغرف
    if ($this->has('rooms_enabled')) {
        $rules['rooms_count'] = 'required|integer|min:1';
        $rules['room_price'] = 'required|numeric|min:0';
    }

    // ✅ التصوير
    if ($this->has('photo_enabled')) {
        $rules['photo_price'] = 'required|numeric|min:0';
    }

    // ✅ الغناء
    if ($this->has('songs_enabled')) {
        $rules['songs_count'] = 'required|integer|min:1';
        $rules['song_price'] = 'required|numeric|min:0';
    }

    // ✅ السرفيس
    if ($this->has('service_enabled')) {
        $rules['service_price'] = 'required|numeric|min:0';
    }

    // ✅ الاوبشن الإضافي
    if ($this->has('extra_option_enabled')) {
        $rules['extra_option_name'] = 'required|string';
        $rules['extra_option_price'] = 'required|numeric|min:0';
    }

    return $rules;
}

}
