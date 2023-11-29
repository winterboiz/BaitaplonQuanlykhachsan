<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
     protected $table = "hoadon";

     protected $fillable = ['id','khachhang_id','thuephong_id','tienphong','tiendichvu','tongtien','user_id'];
     protected $hidden =[];


    public function phieuthue() {
        return $this->belongsTo('App\Checkin', 'thuephong_id','id');
    }
    public function customer() {
        return $this->belongsTo('App\Customer', 'khachhang_id', 'id');
    }


}
