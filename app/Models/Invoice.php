<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];
    protected $dates = ['invoice_Date'];

    public function section(){

        return $this->belongsTo(Section::class , 'section_id');
    }

    public function product(){

        return $this->belongsTo(Product::class , 'product_id');
    }


    public function attachments(){
        return $this->hasMany(InvoicesAttachments::class , 'invoice_id');
    }


public function invoiceDetails()
{
    return $this->hasMany(InvoicesDetails::class);
}

 public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }


    public function customer()
{
    return $this->belongsTo(Customer::class);
}

}
