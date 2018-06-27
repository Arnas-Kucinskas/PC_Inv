<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vartotojas extends Model
{
    // T
    protected $table = 'user';
   //public $primaryKey = '$id';
    public $timestamps = true;

    public function computers()
    {
        return $this->hasMany('App\Computer');
    }
    

     public static function AscOrDesc($adval){
           if($adval == 'desc')
           {
            $adval = 'asc';
            return $adval;
           }
           else
           {
            $adval = 'desc';
            return $adval;
           }
       }
     
}

