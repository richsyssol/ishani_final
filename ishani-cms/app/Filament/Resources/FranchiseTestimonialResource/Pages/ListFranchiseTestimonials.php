<?php

namespace App\Filament\Resources\FranchiseTestimonialResource\Pages;

use App\Filament\Resources\FranchiseTestimonialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFranchiseTestimonials extends ListRecords
{
    protected static string $resource = FranchiseTestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
