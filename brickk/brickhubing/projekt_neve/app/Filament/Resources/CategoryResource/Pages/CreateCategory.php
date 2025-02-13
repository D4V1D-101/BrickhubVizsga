<?php

namespace App\Filament\Resources\GenreResource\Pages;
use App\Filament\Resources\GenreResource;
use App\Models\Genres;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateGenre extends CreateRecord
{
    protected static string $resource = GenreResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Category Created')
            ->body('Category has been created successfully.');
    }
}
