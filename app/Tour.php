<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tour';
    protected $fillable = ['name','image','typetour', 'schedule' , 'depart', 'number' , 'price'];
}
