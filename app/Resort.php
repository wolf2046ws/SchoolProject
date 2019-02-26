<?php

namespace App;
use App\Location;


use Illuminate\Database\Eloquent\Model;

class Resort extends Model
{
    //
    public function location(){
        return $this->belongsTo(Location::class);
    }

}
