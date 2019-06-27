<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
use Picture;
use User;
use HistoryPeriod;

class Post extends Model
{
    protected $table = 'baiviet';
    public $timestamps = false;

    public function picture(){
    	return $this->hasMany('App\Picture', 'BaiViet_id');
    }

    public function historyPeriod(){
    	return $this->belongsTo('App\HistoryPeriod', 'GiaiDoan_id');
    }

    public function user(){
    	return $this->belongsTo('App\User', 'users_id');
    }
}
