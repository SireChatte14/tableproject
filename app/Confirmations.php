<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Confirmations extends Model
{

    protected $guarded =[];

    use SoftDeletes;

    public function confirmable()
    {
        return $this->morphTo();
    }

    public function related()
    {
       return $this->confirmable()->first();
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }

}
