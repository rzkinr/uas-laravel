<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $table = 'merk';
    public $incrementing = false; //Karena kita tidak menggunakan auto_increment
    // public $primaryKey = 'merk_id';
    // protected $casts = ['merk_id'=>'string'];
}
