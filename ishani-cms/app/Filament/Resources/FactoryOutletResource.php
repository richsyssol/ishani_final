<?php

namespace App\Filament\Resources;

use App\Models\FactoryOutlet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\FactoryOutletResource\Pages;

class FactoryOutletResource extends Resource
{
    protected static ?string $model = FactoryOutlet::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Main Content')
                    ->schema([
                        Forms\Components\TextInput::make('header')
                            ->required()
                            ->maxLength(255),
                            
                        Forms\Components\RichEditor::make('text_content')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                    
                Forms\Components\Section::make('Location Information')
                    ->schema([
                        Forms\Components\TextInput::make('location_line_1')
                            ->label('Address Line 1')
                            ->required(),
                        Forms\Components\TextInput::make('location_line_2')
                            ->label('Address Line 2'),
                        Forms\Components\TextInput::make('location_line_3')
                            ->label('Address Line 3'),
                        Forms\Components\TextInput::make('location_line_4')
                            ->label('Address Line 4'),
                    ]),
                    
                Forms\Components\Section::make('Opening Hours')
                    ->schema([
                        Forms\Components\TextInput::make('opening_hours_line_1')
                            ->label('Opening Hours Line 1')
                            ->required(),
                        Forms\Components\TextInput::make('opening_hours_line_2')
                            ->label('Opening Hours Line 2'),
                    ]),
                    
                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('contact_number')
                            ->required()
                            ->tel(),
                    ]),
                    
                Forms\Components\Toggle::make('is_active')
                    ->required()
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('header')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_number'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            // ->actions([
            //     Tables\Actions\EditAction::make(),
            // ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // No relations needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFactoryOutlets::route('/'),
            'create' => Pages\CreateFactoryOutlet::route('/create'),
            'edit' => Pages\EditFactoryOutlet::route('/{record}/edit'),
        ];
    }
}