<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    //
    protected $fillable = [
        'name', 'model', 'serial_number', 'asset_id'
    ];

    public function users(){
        return $this->belongsToMany(Hardware::class, 'requests', 'component_id')
            ->where('component_type', 'Hardware');
    }
}
