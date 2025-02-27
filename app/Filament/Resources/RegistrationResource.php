<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistrationResource\Pages;
use App\Filament\Resources\RegistrationResource\RelationManagers;
use App\Models\Registration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;


class RegistrationResource extends Resource
{
    protected static ?string $model = Registration::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Registrasi';
    protected static ?string $navigationGroup = 'Manajemen Event';

    public static function form(Form $form): Form
{
    return $form->schema([
        Forms\Components\Select::make('user_id')
            ->label('Nama Pengguna')
            ->options(\App\Models\User::pluck('name', 'id'))
            ->searchable()
            ->required(),

        Forms\Components\Select::make('event_id')
            ->label('Nama Event')
            ->options(\App\Models\Event::pluck('name', 'id'))
            ->searchable()
            ->required(),

        Forms\Components\Select::make('status')
            ->label('Status')
            ->options([
                'pending' => 'Pending',
                'approved' => 'Approved',
                'rejected' => 'Rejected',
            ])
            ->required(),
    ]);
}

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            \Filament\Tables\Columns\TextColumn::make('user.name')
                ->label('Nama Pengguna')
                ->sortable()
                ->searchable(),

            \Filament\Tables\Columns\TextColumn::make('user.email')
                ->label('Email Pengguna')
                ->sortable()
                ->searchable(),

            \Filament\Tables\Columns\TextColumn::make('user.nim')
                ->label('NIM')
                ->sortable(),

            \Filament\Tables\Columns\TextColumn::make('event.name')
                ->label('Nama Event')
                ->sortable()
                ->searchable(),

            \Filament\Tables\Columns\TextColumn::make('event.price')
                ->label('Harga')
                ->money('IDR')
                ->sortable(),

            \Filament\Tables\Columns\BadgeColumn::make('event.price')
                ->label('Tipe Event')
                ->formatStateUsing(fn ($state) => $state > 0 ? 'BERBAYAR' : 'GRATIS')
                ->colors([
                    'warning' => fn ($state) => $state > 0,
                    'success' => fn ($state) => $state == 0,
                ]),

            \Filament\Tables\Columns\ImageColumn::make('payment_proof')
                ->label('Bukti Pembayaran')
                ->size(100)
                ->circular(false)
                ->square()
                ->url(fn ($record) => $record->payment_proof ? asset('storage/' . $record->payment_proof) : null)
                ->openUrlInNewTab(),

            \Filament\Tables\Columns\BadgeColumn::make('status')
                ->colors([
                    'primary' => 'pending',
                    'success' => 'approved',
                    'danger' => 'rejected',
                ]),

            \Filament\Tables\Columns\TextColumn::make('created_at')
                ->label('Tanggal Registrasi')
                ->dateTime('d M Y H:i'),
        ])
        ->groups([
            Tables\Grouping\Group::make('event.name')
                ->label('Event')
                ->collapsible()
        ])
        ->defaultGroup('event.name')
        ->defaultSort('event.name', 'asc')
        ->filters([
            \Filament\Tables\Filters\SelectFilter::make('status')
                ->options([
                    'pending' => 'Pending',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                ]),
            \Filament\Tables\Filters\SelectFilter::make('event')
                ->relationship('event', 'name')
                ->label('Filter Event')
        ])
        ->actions([
            \Filament\Tables\Actions\EditAction::make(),
            \Filament\Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            \Filament\Tables\Actions\BulkActionGroup::make([
                \Filament\Tables\Actions\BulkAction::make('approve')
                    ->action(fn ($records) => $records->each->update(['status' => 'approved']))
                    ->label('Setujui'),
                \Filament\Tables\Actions\BulkAction::make('reject')
                    ->action(fn ($records) => $records->each->update(['status' => 'rejected']))
                    ->label('Tolak'),
            ]),
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
            'index' => Pages\ListRegistrations::route('/'),
            'create' => Pages\CreateRegistration::route('/create'),
            'edit' => Pages\EditRegistration::route('/{record}/edit'),
        ];
    }
}
