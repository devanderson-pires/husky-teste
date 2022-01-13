<?php

namespace Database\Seeders;

use App\Models\Entrega;
use Illuminate\Database\Seeder;

class EntregaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entrega::create([
            'cliente_id' => 1,
            'entregador_id' => 1,
            'status' => 'Novo',
            'ponto_coleta' => 'Rua 1',
            'ponto_destino' => 'Rua 2'
        ]);
    }
}
