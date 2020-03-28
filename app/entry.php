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


    public function getStartAttribute($value)

    {

        $dateStart = Carbon::createFormFormat('d-m-Y H:i:S', $value)->format('D-m-Y');
        $timeStart = Carbon::createFormFormat('d-m-Y H:i:S', $value)->format('D-m-Y');

        return $this->start = ($timeStart == '00:00:00' ? $dateStart : $value);
    }

    public function getEndAttribute($value)

    {

        $dateEnd = Carbon::createFormFormat('d-m-Y H:i:S', $value)->format('D-m-Y');
        $timeEnd = Carbon::createFormFormat('d-m-Y H:i:S', $value)->format('D-m-Y');

        return $this->End= ($timeEnd == '00:00:00' ? $dateEnd : $value);
    }

    public function user(){
        return $this -> hasMany(user::class);
    }

    /**
     * Get the post's confirmations.
     */
    public function confirmations()
    {
        return $this->morphmany('App\Confirmations', 'confirmable');

    }

    public function isConfirmed (User $user = null)

    {

        $user = ($user !== null) ? $user : auth()-> user();

        return ($this->confirmations()->where ('user_id',$user->id)->count()== 1) ? true :false;

    }

    public function confirm (User $user= null)

    {
        $user = ($user !== null) ? $user : auth()-> user();
        return $this->confirmations()->create(["user_id"=>$user->id]);
    }

}
