<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Order;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;
    protected $table='khachhang';
    protected $fillable  = ['tenkhachhang','cmnd','diachi','gioitinh','dienthoai','email','quoctich','username','password','facebook_id'];

    protected $hidden = [];


    public function order() {
        return $this->hasOne('App\Order', 'khachhang_id', 'id');
    }
    public function addNew($input)
    {
        $check = static::where('facebook_id',$input['facebook_id'])->first();


        if(is_null($check)){
            return static::create($input);
        }


        return $check;
    }

}
