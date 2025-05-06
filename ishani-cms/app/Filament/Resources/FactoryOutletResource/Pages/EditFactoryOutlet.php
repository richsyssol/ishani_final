<?php

namespace App\Filament\Resources\FactoryOutletResource\Pages;

use App\Filament\Resources\FactoryOutletResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFactoryOutlet extends EditRecord
{
    protected static string $resource = FactoryOutletResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
