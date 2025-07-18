<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicesDetails extends Model
{
    use HasFactory;

    protected $guarded =[];


    // InvoiceDetail.php
public function invoice()
{
    return $this->belongsTo(Invoice::class);
}



}
