<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\Project;
use App\Filament\Resources\ProjectResource\Pages;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?string $navigationGroup = 'Portfolio';
    protected static ?string $modelLabel = 'Project';
    protected static ?string $navigationLabel = 'Projects';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\Select::make('location')
                    ->options([
                        'Bangalore' => 'Bangalore',
                        'Mumbai' => 'Mumbai',
                        'Delhi' => 'Delhi',
                        'Hyderabad' => 'Hyderabad',
                    ])
                    ->required(),
                    
                Forms\Components\Select::make('client_type')
                    ->options([
                        'Residential' => 'Residential',
                        'Commercial' => 'Commercial',
                        'Hospitality' => 'Hospitality',
                    ])
                    ->required(),
                    
                Forms\Components\FileUpload::make('before_image')
                    ->label('Before Image')
                    ->image()
                    ->directory('projects')
                    ->visibility('public')
                    ->preserveFilenames()
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->disk('public_uploads')
                    ->required(),
                    
                Forms\Components\FileUpload::make('after_image')
                    ->label('After Image')
                    ->image()
                    ->directory('projects')
                     ->visibility('public')
                    ->preserveFilenames()
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->disk('public_uploads')
                    ->required(),
                    
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                    
                Forms\Components\TagsInput::make('products_used')
                    ->placeholder('Add product')
                    ->required(),
                    
                Forms\Components\TextInput::make('date')
                    ->required()
                    ->placeholder('Jan 2023'),
                    
                Forms\Components\TextInput::make('seo_title')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('upvc-door-installation-bangalore'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('before_image')
                    ->label('Before')
                    ->disk('public_uploads'),
                    
                Tables\Columns\ImageColumn::make('after_image')
                    ->label('After')
                    ->disk('public_uploads'),
                    
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('client_type')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('date')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('location')
                    ->options([
                        'Bangalore' => 'Bangalore',
                        'Mumbai' => 'Mumbai',
                        'Delhi' => 'Delhi',
                        'Hyderabad' => 'Hyderabad',
                    ]),
                    
                Tables\Filters\SelectFilter::make('client_type')
                    ->options([
                        'Residential' => 'Residential',
                        'Commercial' => 'Commercial',
                        'Hospitality' => 'Hospitality',
                    ]),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}