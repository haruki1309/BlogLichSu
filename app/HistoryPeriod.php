<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryPeriod extends Model
{
    protected $table = "giaidoan";
    public $timestamps = false;


    public function post(){
    	return $this->hasMany('App\Post', 'GiaiDoan_id');
    }
}
