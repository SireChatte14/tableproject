<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable=['entry_id','name','title','start','NumberOfPeople','end','color','phone','description'];

    public function getStartAttribut($value) {

        $dateStart = carbon::createFormFormat('Y-m-d H:i:s',$value)->format('Y-m-d');
        $timeStart = carbon::createFormFormat('Y-m-d H:i:s',$value)->format('Y-m-d');

        return $this->start =($timeStart == '00:00:00' ? $dateStart : $value);

        }

        public function getEndAttribut($value) {

            $dateEnd = carbon::createFormFormat('Y-m-d H:i:s',$value)->format('Y-m-d');
            $timeEnd = carbon::createFormFormat('Y-m-d H:i:s',$value)->format('Y-m-d');

            return $this->end =($timeEnd == '00:00:00' ? $dateEnd : $value);
        }

    public function entry(){
        return $this -> hasOne(entry::class);
    }
}
