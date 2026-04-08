<?php

namespace App\Http\Controllers;

use App\Models\AcercaDe;
use Illuminate\Http\Request;


class AcercaDeController extends Controller
{
    public function show()
    {
        $info = AcercaDe::firstOrFail();
        return view('acerca-de.show', compact('info'));
    }
}