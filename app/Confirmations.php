<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmations extends Model
{

    protected $guarded =[];
    /**
     * @var mixed
     */

    /**
     *
     *
     * Get the owning imageable model.
     */
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
        return $this->belongsTo(User::class, 'user_id');
    }

}
