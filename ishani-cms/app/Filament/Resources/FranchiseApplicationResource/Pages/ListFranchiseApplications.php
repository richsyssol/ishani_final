<?php

namespace App\Filament\Resources\FranchiseApplicationResource\Pages;

use App\Filament\Resources\FranchiseApplicationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFranchiseApplications extends ListRecords
{
    protected static string $resource = FranchiseApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
