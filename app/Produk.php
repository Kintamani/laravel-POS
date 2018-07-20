<?php

namespace POS;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    public function Kategori()
    {
        return $this->belongsTo('App.Kategori');
    }
}
