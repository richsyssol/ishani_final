<?php

namespace App\Filament\Resources;

use App\Models\CompanyInformation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\CompanyInformationResource\Pages;

class CompanyInformationResource extends Resource
{
    protected static ?string $model = CompanyInformation::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'Company Settings';

    protected static ?string $modelLabel = 'Company Information';

    protected static ?string $navigationLabel = 'Company Information';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Company Overview Section
                Forms\Components\Section::make('Company Overview')
                    ->schema([
                        Forms\Components\FileUpload::make('company_overview_image')
                            ->image()
                            ->directory('company-images')
                            ->maxSize(2048) // 2MB
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->imageEditor()
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('company_overview')
                            ->toolbarButtons([
                                'blockquote',
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ])
                            ->columnSpanFull(),
                    ]),

                // Manufacturing Facility Section
                Forms\Components\Section::make('Our Manufacturing Facility')
                    ->schema([
                        Forms\Components\TextInput::make('manufacturing_facility_header')
                            ->label('Section Header')
                            ->maxLength(255),

                        Forms\Components\RichEditor::make('manufacturing_facility_description')
                            ->toolbarButtons([
                                'bulletList',
                                'bold',
                                'italic',
                                'link',
                            ])
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('manufacturing_facility_images')
                            ->multiple()
                            ->image()
                            ->directory('manufacturing-facility-images')
                            ->maxFiles(4) // Limit to 4 images as requested
                            ->reorderable()
                            ->appendFiles()
                            ->imageEditor()
                            ->columnSpanFull(),

                        Forms\Components\Repeater::make('manufacturing_facility_images_alt')
                            ->label('Image Alt Texts')
                            ->schema([
                                Forms\Components\TextInput::make('alt')
                                    ->label('Description')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull()
                            ])
                            ->columnSpanFull()
                            ->itemLabel(fn(array $state): ?string => $state['alt'] ?? null)
                            ->hidden(fn($get) => empty($get('manufacturing_facility_images')))
                    ]),

                // Leadership Team Section
                Forms\Components\Section::make('Our Leadership Team')
                    ->schema([
                        Forms\Components\Repeater::make('leadership_team')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->directory('leadership-team')
                                    ->avatar()
                                    ->imageEditor()
                                    ->circleCropper(),

                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('position')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\Textarea::make('bio')
                                    ->required()
                                    ->rows(3)
                                    ->maxLength(1000)
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('image_alt')
                                    ->label('Image Alt Text')
                                    ->required()
                                    ->maxLength(255)
                            ])
                            ->defaultItems(1)
                            ->columns(2)
                            ->columnSpanFull()
                            ->addActionLabel('Add Team Member')
                            ->collapsible()
                            ->cloneable()
                            ->itemLabel(fn(array $state): ?string => $state['name'] ?? null),
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
            ->filters([
                // No filters needed for singleton
            ])
            // ->actions([
            //     Tables\Actions\EditAction::make()
            //         ->label('Edit Company Info'),
            // ])
            ->bulkActions([
                // Disable bulk actions
            ])
            ->paginated(false)
            ->deferLoading();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanyInformation::route('/'),
            'create' => Pages\CreateCompanyInformation::route('/create'),
            'edit' => Pages\EditCompanyInformation::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return CompanyInformation::count() === 0;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return true;
    }

    public static function canViewAny(): bool
    {
        return true;
    }

    public static function getNavigationBadge(): ?string
    {
        return CompanyInformation::exists() ? '✓' : null;
    }
}