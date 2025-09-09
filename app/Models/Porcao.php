<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Porcao extends Model
{
    use HasFactory;

    protected $table = 'porcoes';

    protected $fillable = [
        'alimento_id',
        'peso'
    ];

    protected $casts = [
        'peso' => 'decimal:2'
    ];

    public function alimento()
    {
        return $this->belongsTo(Alimento::class);
    }
}