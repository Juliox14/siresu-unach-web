<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class UnachApiService
{
    /**
     * Fetch general news from DCS UNACH API.
     */
    public static function getNews(int $count = 6): array
    {
        return cache()->remember("unach_api_news_{$count}", now()->addMinutes(30), function () use ($count) {
            try {
                $response = Http::timeout(5)
                    ->get("https://dcs.unach.mx/apidcs/index.php/api_dcs/articuloscant/{$count}");
                
                if ($response->successful()) {
                    $items = $response->json();
                    if (is_array($items)) {
                        return collect($items)->map(function ($item) {
                            $id = $item['id'] ?? '';
                            $alias = $item['alias'] ?? '';
                            return (object) [
                                'id' => $id,
                                'is_api' => true,
                                'titulo' => $item['title'] ?? '',
                                'slug' => $alias,
                                'url' => "https://dcs.unach.mx/index.php/sala-de-prensa/item/{$id}-{$alias}.html",
                                'resumen' => self::extractSummary($item['introtext'] ?? ''),
                                'contenido' => $item['introtext'] ?? '',
                                'autor_texto' => 'DCS UNACH',
                                'imagen_portada' => 'https://dcs.unach.mx/media/k2/items/cache/' . md5('Image' . $id) . '_M.jpg',
                                'fecha_publicacion' => isset($item['publish_up']) ? Carbon::parse($item['publish_up']) : now(),
                            ];
                        })->all();
                    }
                }
            } catch (\Exception $e) {
                Log::error("UNACH News API Error: " . $e->getMessage());
            }
            return [];
        });
    }

    /**
     * Fetch general university events from main UNACH API.
     */
    public static function getEvents(int $count = 8): array
    {
        return cache()->remember("unach_api_events_{$count}", now()->addMinutes(30), function () use ($count) {
            try {
                $response = Http::timeout(5)
                    ->get("https://www.unach.mx/apis/apiunach/index.php/api_unach/articuloscant/{$count}");
                
                if ($response->successful()) {
                    $items = $response->json();
                    if (is_array($items)) {
                        return collect($items)->map(function ($item) {
                            $id = $item['id'] ?? '';
                            $alias = $item['alias'] ?? '';
                            return (object) [
                                'id' => $id,
                                'is_api' => true,
                                'titulo' => $item['title'] ?? '',
                                'slug' => $alias,
                                'url' => "https://unach.mx/index.php/component/k2/{$alias}",
                                'descripcion' => self::extractSummary($item['introtext'] ?? ''),
                                'horario' => 'Por definir / Ver sitio web',
                                'categoria' => 'General',
                                'direccion' => 'Página Central UNACH',
                                'ciudad' => 'Tuxtla Gutiérrez, Chiapas',
                                'icono' => 'heroicon-o-calendar',
                                'imagen' => 'https://www.unach.mx/media/k2/items/cache/' . md5('Image' . $id) . '_L.jpg',
                                'fecha_evento' => isset($item['created']) ? Carbon::parse($item['created']) : now(),
                            ];
                        })->all();
                    }
                }
            } catch (\Exception $e) {
                Log::error("UNACH Events API Error: " . $e->getMessage());
            }
            return [];
        });
    }

    /**
     * Clean and extract summary from HTML content.
     */
    private static function extractSummary(string $html): string
    {
        $text = strip_tags($html);
        $text = preg_replace('/^\s*\d{1,2}\/[A-Za-z]+\/\d{4}\s*/', '', $text);
        $text = preg_replace('/^\s*DCS\d{4}\/\d+\s*/', '', $text);
        $text = html_entity_decode($text);
        $text = preg_replace('/\s+/', ' ', $text);
        return trim($text);
    }
}
