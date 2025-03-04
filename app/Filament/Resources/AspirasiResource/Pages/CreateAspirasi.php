<?php

namespace App\Filament\Resources\AspirasiResource\Pages;

use App\Filament\Resources\AspirasiResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAspirasi extends CreateRecord
{
    protected static string $resource = AspirasiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
} 