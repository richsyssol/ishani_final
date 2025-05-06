<?php

namespace App\Filament\Resources\FranchiseTestimonialResource\Pages;

use App\Filament\Resources\FranchiseTestimonialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFranchiseTestimonial extends EditRecord
{
    protected static string $resource = FranchiseTestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
