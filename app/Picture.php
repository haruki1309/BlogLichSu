<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = "hinhanhbaiviet";
    public $timestamps = false;

    public function post(){
    	return $this->belongsTo('App\Post', 'BaiViet_id');
    }
}
