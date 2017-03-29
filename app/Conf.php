<?php

namespace Evolution;

use Illuminate\Database\Eloquent\Model;

class Conf extends Model
{
    //

    public static function Name($name,$namespace=""){
    	//TODO cache
    	return  self::where(['name'=>$name,'namespace'=>$namespace])->first()->get();
    }
}
