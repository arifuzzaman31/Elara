<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $table = 'Customers'; 
   protected $fillable = [
        'customer_name', 'customer_email', 'customer_passwrod','phone'
    ];
}
