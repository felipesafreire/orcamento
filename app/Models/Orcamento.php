<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    protected $fillable = [
        'cliente_id',
        'vendedor_id',
        'total',
        'data',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function vendedor()
    {
        return $this->belongsTo('App\Models\Vendedor');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function itens()
    {
        return $this->hasMany('App\Models\OrcamentoProduto');
    }
    
}
