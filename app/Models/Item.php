<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    public $incrementing = false; //Karena kita tidak menggunakan auto_increment
    // public $primaryKey = 'item_id';
    // protected $casts = ['item_id'=>'string'];

    //Relasi
    public function kategorii()
    {
        return $this->belongsTo('App\Models\Kategori', 'kategori_id', 'kategori_id');
    }

    public function merkk()
    {
        return $this->belongsTo('App\Models\Merk', 'merk_id', 'merk_id');
    }

    public function supplierr()
    {
        return $this->belongsTo('App\Models\Supplier', 'supplier_id', 'supplier_id');
    }
}
