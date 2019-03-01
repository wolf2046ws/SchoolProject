<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name','contract_start','contract_end',
        'gender', 'manager', 'company_id', 'resort_id', 'department_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function resort(){
        return $this->belongsTo(Resort::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function softwares(){
        return $this->hasMany(ComponentRequest::class)->where('component_type','Software');
    }

    public function hardwares(){
        return $this->hasMany(ComponentRequest::class)->where('component_type','Hardware');
    }

    public function files(){
        return $this->hasMany(ComponentRequest::class)->where('component_type','Files');
    }

}
