<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;


class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Manajemen Event';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\Textarea::make('description')->required(),
            Forms\Components\DateTimePicker::make('event_date')->required(),
            Forms\Components\Toggle::make('registration_open')->default(true),
            Forms\Components\Toggle::make('is_visible')
            ->label('Tampilkan Event')
            ->default(true),
            Forms\Components\TextInput::make('price')            
            ->label('Harga Tiket')
            ->numeric()
            ->required()
            ->default(0)
            ->minValue(0),

            Forms\Components\FileUpload::make('photo')
                ->label('Foto Acara')
                ->required()
                ->directory('events') // Direktori penyimpanan
                ->image() // Hanya menerima file gambar
        ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('event_date')->dateTime(),
            Tables\Columns\TextColumn::make('registration_open')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    '1' => 'success',
                    '0' => 'danger',
                })
                ->label('Status Pendaftaran'),
                Tables\Columns\ImageColumn::make('photo')
                ->label('Foto Acara')
                ->width(50)
                ->height(50)
                ->getStateUsing(fn ($record) => asset('storage/' . $record->photo)),
                Tables\Columns\BooleanColumn::make('is_visible')
                ->label('Tampilkan'),
            
                
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}