<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class entry extends Model
{
    protected $table='entrys';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable =['NumberOfPeople','bookingdate','fromtime','LengthOfStay','endTime','sms','name','phone','message'];


    public function getStartAttribute($value){

        $dateStart = Carbon::createFormFormat('Y--m-d H:i:S', $value)->format('Y-m-D');
        $timeStart = Carbon::createFormFormat('Y--m-d H:i:S', $value)->format('Y-m-D');

        return $this->start = ($timeStart == '00:00:00' ? $dateStart : $value);
    }

    public function getEndAttribute($value){

        $dateEnd = Carbon::createFormFormat('Y--m-d H:i:S', $value)->format('Y-m-D');
        $timeEnd = Carbon::createFormFormat('Y--m-d H:i:S', $value)->format('Y-m-D');

        return $this->End= ($timeEnd == '00:00:00' ? $dateEnd : $value);
    }

    public function user(){
        return $this -> hasMany(user::class);
    }

    public function confirmations() {

        return $this->morphMany('App\confirmations','confirmable');
    }

}
