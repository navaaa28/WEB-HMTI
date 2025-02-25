<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;
    protected static ?string $navigationIcon = 'heroicon-o-qr-code';
    protected static ?string $navigationLabel = 'Verifikasi QR Code';
    protected static ?string $navigationGroup = 'Menu Verifikasi';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('registration_id')->disabled(),
            Forms\Components\TextInput::make('qr_code')->disabled(),
            Forms\Components\Select::make('status')
                ->options([
                    'unused' => 'Unused',
                    'used' => 'Used',
                ])
                ->disabled(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('registration.event.name')
                    ->label('Event')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('registration.user.name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration.user.nim')
                    ->label('NIM')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('qr_code')
                    ->label('QR Code')
                    ->circular(false)
                    ->square(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn ($state) => $state === 'used' ? 'success' : 'warning'),
            ])
            ->groups([
                Tables\Grouping\Group::make('registration.event.name')
                    ->label('Event')
                    ->collapsible()
            ])
            ->defaultGroup('registration.event.name')
            ->defaultSort('registration.event.name', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('event')
                    ->relationship('registration.event', 'name')
                    ->label('Filter Event')
            ])
            ->actions([
                Tables\Actions\Action::make('verifikasi')
                    ->label('Verifikasi')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->requiresConfirmation()
                    ->action(fn (Ticket $ticket) => $ticket->update(['status' => 'used']))
                    ->visible(fn (Ticket $ticket) => $ticket->status === 'unused') // Hanya muncul jika tiket masih "unused"
                    ->successNotificationTitle('Tiket berhasil diverifikasi!'), // Notifikasi sukses
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTickets::route('/'),
        ];
    }
}
