<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeUserMail;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    private string $plainPassword;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (empty($data['password'])) {
            $this->plainPassword = Str::random(10);
        } else {
            $this->plainPassword = $data['password'];
        }
        
        $data['password'] = bcrypt($this->plainPassword);

        return $data;
    }

    protected function afterCreate(): void
    {
        $user = $this->record;
        
        $user->load('departamento');

        Mail::to($user->email)->send(new WelcomeUserMail($user, $this->plainPassword));
    }
}
