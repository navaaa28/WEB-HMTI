<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnggotaResource\Pages;
use App\Models\Anggota;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class AnggotaResource extends Resource
{
    protected static ?string $model = Anggota::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Manajemen Anggota';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->unique()
                    ->maxLength(255),

                Select::make('departemen')
                    ->options([
                        'Pengembangan Sumber Daya Mahasiswa' => 'Pengembangan Sumber Daya Mahasiswa',
                        'Penelitian dan Pengembangan' => 'Penelitian dan Pengembangan',
                        'Perhubungan' => 'Perhubungan',
                        'Bisnis dan Kemitraan' => 'Bisnis dan Kemitraan',
                    ])
                    ->nullable(),
                    

                Select::make('divisi')
                    ->options([
                        'Kaderisasi' => 'Kaderisasi',
                        'Minat Bakat' => 'Minat Bakat',
                        'Pendidikan dan Keprofesian' => 'Pendidikan dan Keprofesian',
                        'Pengabdian Masyarakat' => 'Pengabdian Masyarakat',
                        'Internal' => 'Internal',
                        'Eksternal' => 'Eksternal',
                        'Kominfo' => 'Kominfo',
                        'Produksi' => 'Produksi',
                        'Marketing' => 'Marketing',
                    ])
                    ->nullable(),
                    

                Select::make('jabatan')
                    ->options([
                        'Direktur Utama' => 'Direktur Utama',
                        'Sekretaris Direktur' => 'Sekretaris Direktur',
                        'Direktur Keuangan' => 'Direktur Keuangan',
                        'Sekretaris Umum' => 'Sekretaris Umum',
                        'Direktur Personalia' => 'Direktur Personalia',
                        'Kepala Departemen' => 'Kepala Departemen',
                        'Sekretaris Departemen' => 'Sekretaris Departemen',
                        'Kepala Divisi' => 'Kepala Divisi',
                        'Anggota Divisi' => 'Anggota Divisi',
                    ])
                    ->nullable(),
                    

                FileUpload::make('foto')
                    ->image()
                    ->disk('public') // Pastikan disk public sudah dikonfigurasi
                    ->required()
                    ->directory('anggotas')
                    ->imagePreviewHeight('200')
                    ->label('Foto Anggota'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('alamat')->limit(50)->searchable(),
                TextColumn::make('departemen')->sortable()->searchable(),
                TextColumn::make('divisi')->sortable()->searchable(),
                TextColumn::make('jabatan')->sortable()->searchable(),
                
                ImageColumn::make('foto')
                    ->disk('public')
                    ->label('Foto Anggota')
                    ->width(50)
                    ->height(50),
            ])
            ->filters([
                // Tambahkan filter di sini jika diperlukan
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
        return [
            // Tambahkan relasi jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnggotas::route('/'),
            'create' => Pages\CreateAnggota::route('/create'),
            'edit' => Pages\EditAnggota::route('/{record}/edit'),
        ];
    }
}
