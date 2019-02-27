<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponentRequest extends Model
{
    //
    protected $table = 'requests';

    protected $fillable = [
        'user_id', 'component_id', 'component_type', 'status'
    ];
}
