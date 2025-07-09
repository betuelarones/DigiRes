<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Models\Reservation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ToggleButtons;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Carbon\Carbon;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;
    protected static ?string $navigationIcon = 'heroicon-o-Calendar-Days';
    protected static ?string $navigationLabel = 'Reservas';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('customer_name')
                    ->label('Nombre completo')
                    ->required(),
                TextInput::make('customer_phone')
                    ->label('Teléfono o celular')
                    ->required(),
                DatePicker::make('date')
                    ->label('Fecha')
                    ->placeholder('Ingrese la fecha para la reserva')
                    ->required()
                    ->minDate(Carbon::today()) // solo permite escoger fechas desde hoy en adelante
                    ->displayFormat('d/m/Y')  // Formatea a dias meses y años, en ese orden.
                    ->native(false),   // Hace el formulario de fecha  como el de html, el diseño cambia.
                TextInput::make('guests')
                    ->label('Comensales')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(8)
                    ->placeholder('Número de comensales')
                    ->required(),
                TimePicker::make('start_time')
                    ->label('Hora Inicio')
                    ->required()
                    ->placeholder('00:00')
                    ->format('H:i') // Guarda como "14:00" en la BD.
                    ->seconds(false)   // Quita los segundos
                    ->native(false), // Hace el formulario de hora como el de html, el diseño cambia
                TimePicker::make('end_time')
                    ->label('Hora Fin')
                    ->placeholder('00:00')
                    ->native(false) // Hace el formulario de hora como el de html, el diseño cambia
                    ->required()
                    ->format('H:i')
                    ->seconds(false),  // Quita los segundos
                Select::make('table_id')
                    ->label('Mesa')
                    ->placeholder('Seleccione una mesa')
                    ->relationship(
                        'table',
                        'code',
                        fn(Builder $query) => $query->where('status', 'available') // Filtro para buscar mesas solo disponibles
                    )
                    ->preload()
                    ->searchable()
                    ->required()
                    // GUARD para no romper en Create/List/View si no existe getRecord()
                    ->disabled(fn ($livewire) =>
                        method_exists($livewire, 'getRecord')
                        && in_array(
                            optional($livewire->getRecord())->status,
                            ['cancelled', 'finished'],
                        )
                    ),
                ToggleButtons::make('status')
                    ->label('Estado')
                    ->inline()
                    ->options([
                        'pending'    => 'Pendiente',
                        /* 'confirmed'  => 'Confirmada',
                        'cancelled'  => 'Cancelada',
                        'finished'   => 'Finalizada', */
                    ])
                    ->default('pending')
                    ->reactive()
                    ->afterStateUpdated(function ($state, $set, $get) {
                        // Si cambia a cancelada o finalizada, liberar mesa
                        $reservation = Reservation::find($get('id'));
                        if (in_array($state, ['cancelled', 'finished'])) {
                            $reservation->table->update(['status' => ['available', 'confirmed']]);
                        } else {
                            $reservation->table->update(['status' => 'occupied']);
                        }
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer_name')
                    ->label('Cliente')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('table.code')
                    ->label('Mesa')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('date')
                    ->label('Fecha')
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('start_time')
                    ->label('Inicio')
                    ->time('H:i')
                    ->sortable(),
                TextColumn::make('end_time')
                    ->label('Fin')
                    ->time('H:i')
                    ->sortable(),
                SelectColumn::make('status')
                    ->label('Estado de la Reserva')
                    ->options([
                        'pending'   => 'Pendiente',
                        'confirmed' => 'Confirmada',
                        'cancelled' => 'Cancelada',
                        'finished'  => 'Finalizada',
                    ])
                    ->sortable()
                    ->searchable()
                    ->afterStateUpdated(function ($state, $record) {
                        // Al cambiar el estado en la tabla
                        if (in_array($state, ['cancelled', 'finished'])) {
                            $record->table->update(['status' => 'available']);
                        } else {
                            $record->table->update(['status' => 'occupied']);
                        }
                    }),
                TextColumn::make('created_at')
                    ->label('Fecha de Creación')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
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
                    Tables\Actions\EditAction::make()
                        ->visible(fn($record) => in_array($record->status, ['pending', 'confirmed'])),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::count() > 0 ? 'warning' : 'gray'; // succe
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }
}
