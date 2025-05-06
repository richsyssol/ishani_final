<?php

namespace App\Filament\Resources\CompanyInformationResource\Pages;

use App\Models\CompanyInformation;
use App\Filament\Resources\CompanyInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanyInformation extends ListRecords
{
    protected static string $resource = CompanyInformationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Edit Company Information')
                ->hidden(fn () => CompanyInformation::exists()),
        ];
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [1]; // Only show one record per page
    }
}