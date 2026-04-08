<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class WelcomeWidget extends Widget
{
    protected string $view = 'filament.widgets.welcome-widget';
    
    // 🔥 Esta línea hace que el mensaje ocupe toda la pantalla a lo ancho
    protected int | string | array $columnSpan = 'full'; 
    
    // 🔥 Esta línea asegura que salga hasta arriba, antes que otros widgets
    protected static ?int $sort = 1; 
}