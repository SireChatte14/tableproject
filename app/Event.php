<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable=['entry_id','name','title','start','NumberOfPeople','end','color','phone','description'];



    public function entry(){
        return $this -> hasOne(entry::class);
    }
}
