<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Kind_of_room extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='loaiphong';
    protected $fillable = [
        'tenloaiphong', 'slug','giatien'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function rooms() {
        return $this->hasMany('App\Room', 'loaiphong_id', 'id');
    }
}
