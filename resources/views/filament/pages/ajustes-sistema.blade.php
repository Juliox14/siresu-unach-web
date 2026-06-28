<x-filament-panels::page>
    <div class="h-full">
        <form wire:submit="save">
            {{ $this->form }}

            <div style="margin-top: 32px;">
                <x-filament::button type="submit">
                    Guardar Cambios
                </x-filament::button>
            </div>
        </form>
    </div>
</x-filament-panels::page>
