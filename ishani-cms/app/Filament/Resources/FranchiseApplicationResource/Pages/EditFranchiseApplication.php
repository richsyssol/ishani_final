<?php

namespace App\Filament\Resources\FranchiseApplicationResource\Pages;

use App\Filament\Resources\FranchiseApplicationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFranchiseApplication extends EditRecord
{
    protected static string $resource = FranchiseApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
