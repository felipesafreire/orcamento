<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $fillable = [
        'nome',
    ];
    protected $table = 'vendedores';
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function orcamento()
    {
        return $this->belongsToMany('App\Models\Orcamento');
    }
}
