<?php


namespace App;
use Adldap\Laravel\Facades\Adldap;


class helperClass
{
    public static function getUserOU($user){
        dd($user[0]->memberOf);
        //return group bta3 eluser da -> location->name
        dd(Adldap::search()->groups()->get());
    }
    public static function LDAPConnect(){
        try {
            Adldap::connect();
        } catch (\Exception $e) {
            // Can't connect.
            dd($e->getMessage());
        }
    }
}
