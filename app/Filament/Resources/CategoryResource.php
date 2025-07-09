<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationLabel = 'Categorías';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Grid::make()
                        ->schema([
                            TextInput::make('name')
                                ->label('Nombre')
                                ->required()
                                ->live(onBlur: true) // Hace que mientras se este editando el campo "name" no se genere el Slug, cuando se seleccione fuera del campo recien generará el Slug 
                                ->maxLength(255)
                                ->afterStateUpdated(fn (string $operation, $state, Set $set) => $operation 
                                === 'create' ? $set('slug', Str::slug($state)) : null),

                            TextInput::make('slug')
                                ->label('Slug')
                                ->required()
                                ->disabled()
                                ->dehydrated()
                                ->maxLength(255)
                                ->unique(Category::class, 'slug', ignoreRecord: true),
                        ]),
                FileUpload::make('image')
                    ->label('Imagen')
                    ->image()
                    ->directory('categories')
                    ->visibility('public')
                    ->required(),

                Toggle::make('is_active')
                    ->label('Activo')
                    ->default(true)
                    ->inline(false)
                    ->required(),
                ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Imagen'),
                /* Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(), */
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Creación')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Fecha de Actualización')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                /* Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]), */
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
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
