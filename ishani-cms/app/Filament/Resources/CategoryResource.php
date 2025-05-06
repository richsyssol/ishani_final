<?php

namespace App\Filament\Resources;

use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\CategoryResource\Pages;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('icon')
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->default('Premium quality products for Indian homes'),

                // Hidden field for collection text template
                Forms\Components\Hidden::make('collection_text_template')
                    ->default('Browse our {category} collection - {count} {descriptor} products available')
                    ->dehydrated(),

                Forms\Components\Repeater::make('benefits')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->columnSpanFull()
                    ->itemLabel(fn($state) => $state['title'] ?? 'New Benefit')
                    ->addActionLabel('Add Benefit')
                    ->defaultItems(0) // Start with empty benefits
                    ->collapsible()
                    ->collapsed()
                    ->reorderable()
                    ->helperText('Leave empty to use default benefit'),

                Forms\Components\TextInput::make('product_descriptor')
                    ->required()
                    ->default('products')
                    ->maxLength(30)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('icon'),
                Tables\Columns\TextColumn::make('benefits_count')
                    ->label('Benefits')
                    ->getStateUsing(fn($record) => empty($record->benefits)
                        ? 'Default'
                        : count($record->benefits))
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}