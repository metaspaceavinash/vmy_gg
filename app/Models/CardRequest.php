<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardRequest extends Model
{
    use HasFactory;
    protected $fillable = [
            'id',
            'user_id',
            'business_id',
            'card_id',
            'card_url',
            'ordered_at',
            'name',
            'desination',
            'phone',
            'email',
            'contact_address',
            'subtitle',
            'website_url',
            'logo_url',
            'qr_code',
            'status',
            'printed_at',
    ];
}
