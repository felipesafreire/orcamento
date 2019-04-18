<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrcamentoProduto extends Model
{
    protected $fillable = [
        'orcamento_id',
        'produto_id',
        'valor',
        'quantidade',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function orcamento()
    {
        return $this->belongsToMany('App\Models\Orcamento');
    }

    public function produto()
    {
        return $this->belongsTo('App\Models\Produto');
    }
}
