<?php

namespace App\Filament\Resources;
use App\Filament\Resources\WhoWeAreResource\Pages;
use App\Models\WhoWeAre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class WhoWeAreResource extends Resource
{
    protected static ?string $model = WhoWeAre::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'Who We Are';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Main Content')
                    ->schema([
                        Forms\Components\TextInput::make('section_header')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('text_content')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('section_image')
                            ->image()
                            ->directory('who-we-are')
                            ->required(),
                    ]),
                    
                Forms\Components\Section::make('Statistics')
                    ->schema([
                        Forms\Components\TextInput::make('years_experience')
                            ->numeric()
                            ->suffix('+')
                            ->required(),
                        Forms\Components\TextInput::make('projects_completed')
                            ->numeric()
                            ->suffix('+')
                            ->required(),
                    ])->columns(2),
                    
                Forms\Components\Toggle::make('is_active')
                    ->required()
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('section_image')
                    ->size(80),
                Tables\Columns\TextColumn::make('section_header')
                    ->searchable(),
                Tables\Columns\TextColumn::make('years_experience')
                    ->label('Years')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('projects_completed')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            // ->actions([
            //     Tables\Actions\EditAction::make(),
            //     Tables\Actions\DeleteAction::make(),
            // ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWhoWeAres::route('/'),
            'create' => Pages\CreateWhoWeAre::route('/create'),
            'edit' => Pages\EditWhoWeAre::route('/{record}/edit'),
        ];
    }
}