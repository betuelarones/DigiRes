<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\RelationManagers\AddressRelationManager;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Forms\Get;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Hidden;
// use Filament\Resources\Number;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'heroicon-o-Shopping-Cart';
    protected static ?string $navigationLabel = 'Pedidos';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Detalles del Pedido')->schema([
                        Select::make('user_id')
                            ->label('Cliente')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('payment_method')
                            ->label('Método de Pago')
                            ->options([
                                'tarjeta' => 'Tarjeta',
                                'efectivo' => 'Efectivo',
                            ])
                            ->required(),

                        Select::make('payment_status')
                            ->label('Estado de Pago')
                            ->options([
                                'pendiente' => 'Pendiente',
                                'pagado' => 'Pagado',
                                'fallado' => 'Fallido',
                            ])
                            ->default('pendiente')
                            ->required(),
                        ToggleButtons::make('status')
                            ->label('Estado del Pedido')
                            ->inline()
                            ->required()
                            ->options([
                                'new' => 'Nuevo',
                                'processing' => 'En Proceso',
                                'shipped' => 'Enviado',
                                'delivered' => 'Entregado',
                                'canceled' => 'Cancelado',
                            ])
                            ->default('processing')
                            ->reactive()
                            ->colors([
                                'new' => 'warning',
                                'processing' => 'warning',
                                'shipped' => 'success',
                                'delivered' => 'success',
                                'canceled' => 'danger',
                            ])
                            ->icons([
                                'new' => 'heroicon-m-sparkles',
                                'processing' => 'heroicon-m-arrow-path',
                                'shipped' => 'heroicon-m-truck',
                                'delivered' => 'heroicon-m-check-circle',
                                'canceled' => 'heroicon-m-x-circle',
                            ]),
                        Textarea::make('notes')
                            ->label('Notas del Pedido')
                            ->placeholder('Escribe aquí cualquier nota o instrucción especial para el pedido')
                            ->columnSpanFull(),
                    ])->columns(2),
                    Section::make('Pedido de Productos')->schema([
                        Repeater::make('items')
                            ->relationship()  
                            ->schema([
                                Select::make('product_id')
                                    ->label('Producto')
                                    ->relationship('product', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->distinct()
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                    ->columnSpan(4)
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, Set $set) => $set('unit_amount', 
                                        Product::find($state)->price ?? 0))
                                    ->afterStateUpdated(fn ($state, Set $set) => $set('total_amount',
                                        Product::find($state)->price ?? 0)),

                                TextInput::make('quantity')
                                    ->label('Cantidad')
                                    ->numeric()
                                    ->required()
                                    ->minValue(1)
                                    ->default(1)
                                    ->columnSpan(2)
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, Set $set, Get $get) => $set('total_amount', 
                                        $state * $get('unit_amount'))),

                                TextInput::make('unit_amount')
                                    ->label('Precio Unitario')
                                    ->numeric()
                                    ->required()
                                    ->prefix('S/ ')
                                    ->disabled()
                                    ->dehydrated() // dehydrated, es para que no se envíe al servidor
                                    ->columnSpan(3),

                                TextInput::make('total_amount')
                                    ->label('Total del Producto')
                                    ->required()
                                    ->prefix('S/ ')
                                    ->formatStateUsing(fn ($state) => number_format($state, 2))
                                    ->reactive() // reactive es para que se actualice automáticamente
                                    ->numeric()
                                    ->disabled()
                                    ->dehydrated() 
                                    ->columnSpan(3),
                            ])->columns(12),

                        Placeholder::make('grand_total_placeholder')
                            ->label('Total del Pedido')
                            ->content(function (Get $get, Set $set) {
                                $total=0;
                                if(!$repeaters = $get('items')) {
                                    return $total;
                                }
                                foreach ($repeaters as $key => $repeater) {
                                    $total += $get("items.{$key}.total_amount");
                                }
                                $set('grand_total', $total);
                                return 'S/ ' . number_format($total, 2);
                            }),  
                        Hidden::make('grand_total')
                            ->default(0),
                    ])
                ])->columnSpanFull(), 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Cliente')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('grand_total')
                    ->label('Total del Pedido')
                    ->prefix('S/ ')
                    ->formatStateUsing(fn ($state) => number_format($state, 2))
                    ->sortable(),

                TextColumn::make('payment_method')
                    ->label('Método de Pago')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('payment_status')
                    ->label('Estado de Pago')
                    ->sortable()
                    ->badge() // para que el campo en la tabla tenga un contorno.
                    ->searchable(),

                SelectColumn::make('status')
                    ->label('Estado del Pedido')
                    ->sortable()
                    ->searchable()
                    ->options([
                        'new' => 'Nuevo',
                        'processing' => 'En Proceso',
                        'shipped' => 'Enviado',
                        'delivered' => 'Entregado',
                        'canceled' => 'Cancelado',
                    ]),
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
            AddressRelationManager::class
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::count() > 0 ? 'warning' : 'gray'; 
    }
    

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
