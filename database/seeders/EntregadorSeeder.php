<?php

namespace Database\Seeders;

use App\Models\Entregador;
use Illuminate\Database\Seeder;

class EntregadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entregador::create([
            'nome' => 'Não atribuído',
        ]);
    }
}
