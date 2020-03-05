<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class table extends Model
{
    protected $table='entrys';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable =['tableNumber','numberOfSeats'];
}
