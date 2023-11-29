<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//chưa khai báo Model :)))
use App\Orderdetail;
use App\Customer;

class Order extends Model
{
    protected $table='datphong';
    protected $fillable =['id','khachhang_id','phong_id','ngaydat','ngaytra','created_at'];

    public function phong() {
        return $this->belongsTo('App\Room', 'phong_id','id');
            //->withPivot('ngaydat','ngaytra')
            //->withTimestamps();
    }
    public function rooms(){
        return $this->belongsToMany('App\Room', 'chitietdatphong', 'datphong_id', 'phong_id')
            ->withPivot('ngaydat','ngaytra')
            ->withTimestamps();
    }
    public function customer() {
        return $this->belongsTo('App\Customer', 'khachhang_id', 'id');
    }

}
