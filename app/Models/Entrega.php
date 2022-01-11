<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['cliente_id', 'entregador_id', 'status', 'ponto_coleta', 'ponto_destino'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function entregador()
    {
        return $this->belongsTo(Entregador::class);
    }
}
