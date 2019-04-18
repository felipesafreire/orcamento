<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'titulo',
        'preco',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function orcamentoProdutos()
    {
        return $this->belongsTo('App\Models\OrcamentoProduto');
    }
}
