<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class menu extends Model
{
    protected $table='menus';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable =['title','categorieID','description','price'];
}
