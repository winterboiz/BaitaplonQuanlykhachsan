<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Room extends Model
{
    protected $table='phong';


    protected $fillable = [
        'tenphong', 'tinhtrang','mota','image','loaiphong_id','user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function loaiphong()
    {
        return $this->belongsTo('App\Kind_of_room', 'loaiphong_id', 'id');
    }


    public function chitietdatphong()
    {
        return $this->belongsTo('App\Orderdetail','phong_id','id');
            //->withPivot('ngaydat','ngaytra')
            //->withTimestamps();
    }


    public function order()
    {
        return $this->belongsToMany('App\Order', 'chitietdatphong', 'phong_id', 'datphong_id')
            ->withPivot('ngaydat','ngaytra')
            ->withTimestamps();
    }
    public function checkin(){
        return $this->belongsTo('App\Checkin','phong_id','id');
    }
    public function customer()
    {
        return $this->belongsToMany('App\Customer');
    }

    public function attachments() {
        return $this->hasMany('App\Attachment', 'phong_id', 'id');
    }


}
