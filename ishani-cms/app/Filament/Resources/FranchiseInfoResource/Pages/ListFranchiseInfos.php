<?php

namespace App\Filament\Resources\FranchiseInfoResource\Pages;

use App\Filament\Resources\FranchiseInfoResource;
use App\Models\FranchiseInfo;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFranchiseInfos extends ListRecords
{
    protected static string $resource = FranchiseInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Add Franchise Information')
                ->hidden(FranchiseInfo::exists())
                ->icon('heroicon-o-plus'),
        ];
    }

    // Completely disable pagination
    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No franchise information yet';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Click the "Add Franchise Information" button to create it';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-building-storefront';
    }

    protected function getTableEmptyStateActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Create Franchise Information')
                ->button()
                ->hidden(FranchiseInfo::exists()),
        ];
    }
}