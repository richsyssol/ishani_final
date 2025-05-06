<?php

namespace App\Filament\Resources;

use App\Models\FranchiseInfo;
use Filament\Forms;
use Filament\Forms\Form;
use App\Filament\Resources\FranchiseInfoResource\Pages;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FranchiseInfoResource extends Resource
{
    protected static ?string $model = FranchiseInfo::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationLabel = 'Franchise Information';
    protected static ?string $modelLabel = 'Franchise Information';
    protected static ?string $slug = 'franchise-info';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Franchise Benefits')
                    ->schema([
                        Forms\Components\RichEditor::make('benefits')
                            ->label('')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Franchise Support')
                    ->schema([
                        Forms\Components\RichEditor::make('support')
                            ->label('')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Expansion Cities')
                    ->schema([
                        Forms\Components\TagsInput::make('expansion_cities') // Note: Fixed typo from 'expansion_cities' to 'expansion_cities'
                            ->label('Cities available for expansion')
                            ->placeholder('Add a city')
                            ->required(),
                    ]),
                    Forms\Components\Section::make('Brochure')
                ->schema([
                    Forms\Components\FileUpload::make('brochure_file')
                        ->label('Franchise Brochure')
                        ->directory('franchise-brochures')
                        ->acceptedFileTypes(['application/pdf'])
                        ->downloadable()
                        ->openable()
                        ->helperText('Upload PDF brochure (max 5MB)')
                        ->maxSize(5120),
                ]),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('updated_at')
                ->label('Last Updated')
                ->dateTime()
                ->sortable(),
        ])
        ->filters([])
        // ->actions([
        //     Tables\Actions\EditAction::make(),
        // ])
        ->bulkActions([])
        ->paginated(false); // This ensures no pagination controls appear
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFranchiseInfos::route('/'),
            'create' => Pages\CreateFranchiseInfo::route('/create'),
            'edit' => Pages\EditFranchiseInfo::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return FranchiseInfo::count() === 0;
    }
}