<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Planta extends Model
{
    protected $fillable = [
        'categoria_id',
        'nome',
        'nome_cientifico',
        'descricao',
        'preco',
        'stock',
        'imagem_url',
    ];

    protected function casts(): array
    {
        return [
            'preco' => 'decimal:2',
            'stock' => 'integer',
        ];
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
