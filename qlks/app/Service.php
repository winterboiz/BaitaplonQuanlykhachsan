<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Service extends Model
{
    protected $table='dichvu';

    protected $fillable =['tendichvu','gia','donvi','image','soluong'];

    protected $hidden=[];

    public function sddichvu() {
        return $this->hasMany('App\Useservice', 'dichvu_id','id');
    }

}
