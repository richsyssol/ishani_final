<?php

namespace App\Filament\Resources;

use App\Models\CustomerTestimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\CustomerTestimonialResource\Pages;

class CustomerTestimonialResource extends Resource
{
    protected static ?string $model = CustomerTestimonial::class;

    // Customize these labels
    protected static ?string $modelLabel = 'Customer Testimonial';
    protected static ?string $pluralModelLabel = 'Customer Testimonials';
    protected static ?string $navigationLabel = 'Customer Testimonials';

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?string $navigationGroup = 'Content';

    // Rest of the resource code remains the same...
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('quote')
                    ->required()
                    ->maxLength(500)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('location')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Select::make('rating') // Added
                    ->options([
                        1 => '1',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                        5 => '5',
                    ])
                    ->default(5)
                    ->required(),
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_visible')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('quote')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location'),
                 Tables\Columns\TextColumn::make('rating') // Changed from IconColumn to TextColumn
                ->numeric()
                ->alignCenter()
                ->sortable()
                ->formatStateUsing(fn (int $state): string => "$state/5"),
                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('is_visible')
                    ->options([
                        true => 'Visible',
                        false => 'Hidden',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomerTestimonials::route('/'),
            'create' => Pages\CreateCustomerTestimonial::route('/create'),
            'edit' => Pages\EditCustomerTestimonial::route('/{record}/edit'),
        ];
    }
}
