<?php

namespace App\Filament\Resources;

use App\Models\DefaultBenefit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\DefaultBenefitResource\Pages;

class DefaultBenefitResource extends Resource
{
    protected static ?string $model = DefaultBenefit::class;
    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    protected static ?string $navigationGroup = 'Products';
    protected static ?string $navigationLabel = 'Default Benefit';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([])
            ->modifyQueryUsing(fn ($query) => $query->limit(1));
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDefaultBenefits::route('/'),
            'edit' => Pages\EditDefaultBenefit::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return DefaultBenefit::count() === 0;
    }
}