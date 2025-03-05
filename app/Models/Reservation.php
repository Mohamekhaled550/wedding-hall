<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'groom_name',
        'bride_name',
        'deposit',
        'discount',
        'room_reservation',
        'guests_number',
        'payment_status',
        'dinner_type',
        'notes',
    ];
}

