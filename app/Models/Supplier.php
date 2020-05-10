<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    public $incrementing = false; //Karena kita tidak menggunakan auto_increment
    // public $primaryKey = 'supplier_id';
    // protected $casts = ['supplier_id'=>'string'];
}
