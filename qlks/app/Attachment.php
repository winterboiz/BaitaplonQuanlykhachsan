<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{

    protected $table= "thuvienhinhanh";
    protected $fillable = [
        'type',
        'mime',
        'path',
        'phong_id'
    ];

    public function phong(){
        return $this->belongsTo('App\Room','phong_id','id');
    }


}
