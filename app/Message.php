<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['id','name','id_cus','subject',
          'message'];

    public function customer(){
        return $this->belongsTo('App\Customer','id_customer','id');
    }
}
