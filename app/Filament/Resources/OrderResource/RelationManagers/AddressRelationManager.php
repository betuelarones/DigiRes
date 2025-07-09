<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;

class AddressRelationManager extends RelationManager
{
    protected static string $relationship = 'address';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Dirección de envío')
                ->schema([
                TextInput::make('first_name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),

                TextInput::make('last_name')
                    ->label('Apellido')
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->label('Teléfono')
                    ->required()
                    ->maxLength(255),

                TextInput::make('district')
                    ->label('Distrito')
                    ->required()
                    ->maxLength(255),

                Textarea::make('street_address')
                    ->label('Dirección detallada')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(), // ocupa las dos columnas

                TextInput::make('reference')
                    ->label('Referencia')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
            ])
            ->columns(2) // hace que todos los campos estén en 2 columnas
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('street_address')
            ->columns([
                TextColumn::make('fullname')
                    ->label('Nombre completo'),
                TextColumn::make('phone')
                    ->label('Teléfono'),
                TextColumn::make('district')
                    ->label('Distrito'),
                TextColumn::make('street_address')
                    ->label('Dirección detallada'),
                TextColumn::make('reference')
                    ->label('Referencia'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
