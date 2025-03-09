<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentMethodResource\Pages;
use App\Models\PaymentMethod;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class PaymentMethodResource extends Resource
{
    protected static ?string $model = PaymentMethod::class;

    protected static ?string $modelLabel = 'Metode Pembayaran';

    protected static ?string $pluralModelLabel = 'Metode Pembayaran';

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationGroup = 'Manajemen Acara';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->label('Nama Metode Pembayaran'),
                TextInput::make('description')->label('Deskripsi'),
                FileUpload::make('logo')
                    ->directory('payment_methods')
                    ->label('Logo')
                    ->image()
                    ->optional(),
                FileUpload::make('qr_code')
                    ->directory('payments/qrcode')
                    ->label('Upload QR Code')
                    ->image()
                    ->optional(),
                TextInput::make('bank')->label('Nama Bank')->required(),
                TextInput::make('account_number')->label('Nomor Rekening')->required(),
                TextInput::make('account_name')->label('Nama Pemilik Rekening')->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->label('Nama'),
                TextColumn::make('description')->label('Deskripsi'),
                ImageColumn::make('logo')
                    ->label('Logo')
                    ->height(50)
                    ->width(50)
                    ->visibility(fn ($record): bool => $record->logo !== null && $record->logo !== '')
                    ->getStateUsing(fn ($record) => $record->logo ? asset('storage/' . $record->logo) : null),
                ImageColumn::make('qr_code')
                    ->label('QR Code')
                    ->height(50)
                    ->width(50)
                    ->visibility(fn ($record): bool => $record->qr_code !== null && $record->qr_code !== '')
                    ->getStateUsing(fn ($record) => $record->qr_code ? asset('storage/' . $record->qr_code) : null),
                TextColumn::make('bank')->label('Bank'),
                TextColumn::make('account_number')->label('Nomor Rekening'),
                TextColumn::make('account_name')->label('Nama Pemilik Rekening'),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaymentMethods::route('/'),
            'create' => Pages\CreatePaymentMethod::route('/create'),
            'edit' => Pages\EditPaymentMethod::route('/{record}/edit'),
        ];
    }
}
