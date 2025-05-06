<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FranchiseApplicationResource\Pages;
use App\Models\FranchiseApplication;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FranchiseApplicationResource extends Resource
{
    protected static ?string $model = FranchiseApplication::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Franchise Applications';
    protected static ?string $modelLabel = 'Application';

    public static function canCreate(): bool
{
    return false; // Completely disables the "Create" button
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required(),
                Forms\Components\TextInput::make('preferred_city')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('investment_capacity')
                    ->options([
                        '10-20 lakhs' => '10-20 lakhs',
                        '20-30 lakhs' => '20-30 lakhs',
                        '30-40 lakhs' => '30-40 lakhs',
                        '40-50 lakhs' => '40-50 lakhs',
                        '50+ lakhs' => '50+ lakhs',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('business_experience')
                    ->label('Relevant Business Experience')
                    ->columnSpanFull()
                    ->rows(3),
                Forms\Components\Toggle::make('consent_marketing')
                    ->label('Consent to Marketing')
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('preferred_city'),
                Tables\Columns\TextColumn::make('investment_capacity')
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        '10-20 lakhs' => '₹10-20 Lakhs',
                        '20-30 lakhs' => '₹20-30 Lakhs',
                        '30-40 lakhs' => '₹30-40 Lakhs',
                        '40-50 lakhs' => '₹40-50 Lakhs',
                        '50+ lakhs' => '₹50+ Lakhs',
                        default => $state,
                    })
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '10-20 lakhs' => 'gray',
                        '20-30 lakhs' => 'info',
                        '30-40 lakhs' => 'primary',
                        '40-50 lakhs' => 'warning',
                        '50+ lakhs' => 'success',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('business_experience')
                    ->label('Business Exp.')
                    ->toggleable(isToggledHiddenByDefault: true) // Hidden by default to save space
                    ->searchable()
                    ->limit(30),
                Tables\Columns\IconColumn::make('consent_marketing')
                    ->label('Consent')
                    ->boolean()
                    ->trueIcon('heroicon-o-check')
                    ->falseIcon('heroicon-o-x-mark')
            ])
            ->filters([])
            ->actions([
                
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFranchiseApplications::route('/'),
            // 'create' => Pages\CreateFranchiseApplication::route('/create'),
            // 'edit' => Pages\EditFranchiseApplication::route('/{record}/edit'),
        ];
    }
}
