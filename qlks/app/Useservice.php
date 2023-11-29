<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Checkin;
use App\Service;

class Useservice extends Model
{
    protected $table='sudungdichvu';
    protected $fillable =['id','thuephong_id','dichvu_id','user_id','quantity','created_at','updated_at'];
    protected $hidden =[];

    public function dichvu() {
        return $this->belongsTo('App\Service', 'dichvu_id','id');
    }
    public function checkin() {
        return $this->belongsTo('App\Checkin', 'thuephong_id', 'id');
    }
}
