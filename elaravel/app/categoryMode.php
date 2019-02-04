<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoryMode extends Model
{
      protected $table = 'tbl_category'; 
      protected $fillable = [
        'category_name', 'category_description', 'publication_status'
    ];
}
