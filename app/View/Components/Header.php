<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Departamento; // <-- Importamos el modelo

class Header extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $departamentos = Departamento::orderBy('nombre', 'asc')->get();

        return view('components.header', compact('departamentos'));
    }
}