<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    public $incrementing = false; //Karena kita tidak menggunakan auto_increment
    // public $primaryKey = 'kategori_id';
    // protected $casts = ['kategori_id'=>'string'];
}
