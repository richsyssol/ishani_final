<?php

namespace App\Filament\Resources\FactoryOutletResource\Pages;

use App\Filament\Resources\FactoryOutletResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFactoryOutlets extends ListRecords
{
    protected static string $resource = FactoryOutletResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
