<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manufacture extends Model
{
      protected $table = 'tbl_manufacture'; 
      protected $fillable = [
        'manufacture_name', 'manufacture_description', 'publication_status'
    ];
}
