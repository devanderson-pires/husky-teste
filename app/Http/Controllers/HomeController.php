<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cancelada = Entrega::query()->where('status', '=', 'Cancelada')->count();
        $finalizada = Entrega::query()->where('status', '=', 'Finalizada')->count();

        return view('home.index', compact('cancelada', 'finalizada'));
    }
}
