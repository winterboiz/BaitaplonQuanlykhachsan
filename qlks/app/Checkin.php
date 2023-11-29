<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    protected $table='thuephong';
    protected $fillable =['id','khachhang_id','phong_id','ngaydat','ngaytra','created_at','trangthai','user_id'];

    public function phong() {
        return $this->belongsTo('App\Room', 'phong_id','id');
        //->withPivot('ngaydat','ngaytra')
        //->withTimestamps();
    }
//    public function rooms(){
//        return $this->belongsToMany('App\Room', 'chitietdatphong', 'datphong_id', 'phong_id')
//            ->withPivot('ngaydat','ngaytra')
//            ->withTimestamps();
//    }
    public function customer() {
        return $this->belongsTo('App\Customer', 'khachhang_id', 'id');
    }
    public function sddichvu(){
        return $this->hasMany('App\Useservice','thuephong_id','id');
    }
}
