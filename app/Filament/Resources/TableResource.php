<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TableResource\Pages;
use App\Filament\Resources\TableResource\RelationManagers;
use App\Models\Table as TableModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TableResource extends Resource
{
    protected static ?string $model = TableModel::class;
    protected static ?string $navigationIcon = 'heroicon-o-Inbox';
    protected static ?string $navigationLabel = 'Mesas';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->label('Código de Mesa')
                    ->required()
                    ->length(3)   // El campo será de 3 caracteres
                    ->unique(
                        \App\Models\Table::class, // Clase Eloquent cuyo $table interno se usará
                        'code',                   // Columna única
                        ignorable: fn ($record)   
                            => $record            // Ignora el registro actual al editar
                ),
                Forms\Components\TextInput::make('capacity')
                    ->label('Capacidad')
                    ->numeric()
                    ->required()
                    ->minValue(1)
                    ->maxValue(10),
                Forms\Components\Select::make('status')
                    ->label('Estado')
                    ->options([
                        'available' => 'Disponible',
                        'occupied'  => 'Ocupada',
                    ])
                    ->required()
                    ->default('available'),
                Forms\Components\Select::make('location')
                    ->label('Ubicación')
                    ->options([
                        'primer_piso' => 'Primer piso',
                        'segundo_piso'  => 'Segundo piso',
                    ])
                    ->required()
                    ->searchable()
                    ->placeholder('Selecciona un piso'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Código')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('capacity')
                    ->label('Capacidad')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Estado')
                    ->sortable()
                    ->formatStateUsing(fn($state) => $state === 'available' ? 'Disponible' : 'Ocupada'),
                Tables\Columns\TextColumn::make('location')
                    ->label('Ubicación')
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'primer_piso' => 'Primer piso',
                            'segundo_piso' => 'Segundo piso',
                            default => ucfirst(str_replace('_', ' ', $state)),
                        };
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de creación')
                    ->dateTime('d/m/Y H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Fecha de actualización')
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
            'index' => Pages\ListTables::route('/'),
            'create' => Pages\CreateTable::route('/create'),
            'edit' => Pages\EditTable::route('/{record}/edit'),
        ];
    }
}
