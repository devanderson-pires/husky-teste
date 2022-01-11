<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['empresa'];

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function entregadores()
    {
        return $this->hasMany(Entregador::class);
    }
}
