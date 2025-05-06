<?php

namespace App\Filament\Resources\CustomerTestimonialResource\Pages;

use App\Filament\Resources\CustomerTestimonialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomerTestimonial extends EditRecord
{
    protected static string $resource = CustomerTestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
