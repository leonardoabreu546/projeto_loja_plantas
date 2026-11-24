<?php

namespace App\Http\Controllers;

use App\Models\Planta;
use Illuminate\View\View;

class PlantaController extends Controller
{
    public function index(): View
    {
        $plantas = Planta::with('categoria')
            ->orderBy('nome')
            ->get();

        return view('plantas.index', compact('plantas'));
    }
}
