<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class entry extends Model
{
    protected $table='entrys';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable =['NumberOfPeople','bookingdate','fromtime','LengthOfStay','sms','FirstName','SecondName','phone','message'];
}
