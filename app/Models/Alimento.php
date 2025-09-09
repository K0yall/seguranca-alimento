<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'calorias',
        'carboidratos',
        'proteinas',
        'gorduras_totais',
        'gorduras_saturadas',
        'gorduras_trans',
        'fibra',
        'acucares',
        'sodio',
        'calcio',
        'ferro',
        'potassio',
        'vitamina_c'
    ];

    protected $casts = [
        'calorias' => 'decimal:2',
        'carboidratos' => 'decimal:2',
        'proteinas' => 'decimal:2',
        'gorduras_totais' => 'decimal:2',
        'gorduras_saturadas' => 'decimal:2',
        'gorduras_trans' => 'decimal:2',
        'fibra' => 'decimal:2',
        'acucares' => 'decimal:2',
        'sodio' => 'decimal:2',
        'calcio' => 'decimal:2',
        'ferro' => 'decimal:2',
        'potassio' => 'decimal:2',
        'vitamina_c' => 'decimal:2'
    ];

    public function porcoes()
    {
        return $this->hasMany(Porcao::class);
    }
}