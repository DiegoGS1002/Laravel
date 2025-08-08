<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precificacao extends Model
{
    use HasFactory;

    protected $table = 'precificacao';  // Nome da tabela

    protected $fillable = [
        'sku',
        'description',
        'raw_material_cost',
        'expense',
        'taxes',
        'commission',
        'freight',
        'term',
        'default',
        'assistance',
        'vpc',
        'profit',
        'final_value',
    ];
}
