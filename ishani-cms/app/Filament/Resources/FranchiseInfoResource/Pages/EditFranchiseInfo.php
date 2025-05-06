<?php

namespace App\Filament\Resources\FranchiseInfoResource\Pages;

use App\Filament\Resources\FranchiseInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFranchiseInfo extends EditRecord
{
    protected static string $resource = FranchiseInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
