<?php

namespace POS;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';
    
    public function pembelian()
    {
        return $this->hasMany('POS\Pembelian','id_supplier');
    }
}
