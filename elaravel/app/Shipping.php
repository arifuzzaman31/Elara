<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
	protected $table = 'Shipping';
    protected $fillable = [
        	'shipping_email', 'publicationshipping_first_name_status',
        	'shipping_last_name','shipping_address','shipping_phone',
        	'shipping_city'
    ];
}
