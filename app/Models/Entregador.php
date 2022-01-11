<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entregador extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['nome', 'empresa_id'];
    protected $table = 'entregadores';

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
