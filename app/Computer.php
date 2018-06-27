<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    // T
    protected $table = 'pc';
   //public $primaryKey = '$id';
    public $timestamps = true;

     public function vartotojas()
     {
        return $this->belongsTo('App\Vartotojas');
     }
     
}
