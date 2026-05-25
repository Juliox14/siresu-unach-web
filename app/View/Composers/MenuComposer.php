<?php

namespace App\View\Composers;

use App\Models\EnlaceMenu;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view): void
    {
        $view->with('menuEnlaces', $this->getMenu());
    }

    private function getMenu()
    {
        return Cache::remember('menu_principal', now()->addHours(6), function () {
            return EnlaceMenu::with('hijos')
                ->whereNull('padre_id')
                ->orderBy('orden')
                ->get();
        });
    }
}