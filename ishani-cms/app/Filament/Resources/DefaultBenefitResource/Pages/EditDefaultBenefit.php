<?php

namespace App\Filament\Resources\DefaultBenefitResource\Pages;

use App\Filament\Resources\DefaultBenefitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDefaultBenefit extends EditRecord
{
    protected static string $resource = DefaultBenefitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
