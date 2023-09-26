<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingModel extends Model
{
    use HasFactory;
    protected $table = 'shipping_address';

    protected $fillable = [
        'id',
        'user_id',
        'fullname',
        'mobile1',
        'mobile2',
        'email',	
        'address1',	
        'address2',	
        'city',	
        'state',
        'country',
        'pincode',
        'location_url',
        'landmark',
        'address_type',
        'created_at',
        'updated_at',
    ];

    public function getBussinessName(){
    $business = Business::find($this->business_id);
    if(!empty($business)){
        return $business->title;
    }else{
        return ' - ';
    }
}
}
