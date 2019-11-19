<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function hour(){
        return $this->hasOne('App\Hour','id','hour_id');
    }
}
