<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InternshipResource\Pages;
use App\Filament\Resources\InternshipResource\RelationManagers;
use App\Models\Internship;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InternshipResource extends Resource
{
    protected static ?string $model = Internship::class;

    protected static ?string $navigationGroup = 'Manejemen Magang';

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    
    protected static ?string $navigationLabel = 'Program Magang';

    protected static ?string $modelLabel = 'Program Magang';

    protected static ?string $pluralModelLabel = 'Program Magang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Posisi')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('company')
                            ->label('Nama Perusahaan')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('location')
                            ->label('Lokasi')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi')
                            ->required()
                            ->columnSpanFull(),
                        
                        Forms\Components\RichEditor::make('requirements')
                            ->label('Persyaratan')
                            ->required()
                            ->columnSpanFull(),
                        
                        Forms\Components\DatePicker::make('start_date')
                            ->label('Tanggal Mulai')
                            ->required(),
                        
                        Forms\Components\TextInput::make('duration')
                            ->label('Durasi Magang')
                            ->required()
                            ->default('3 bulan')
                            ->placeholder('Contoh: 3 bulan')
                            ->maxLength(255),
                        
                        Forms\Components\DatePicker::make('end_date')
                            ->label('Tanggal Selesai')
                            ->required()
                            ->after('start_date'),
                        
                        Forms\Components\DatePicker::make('deadline')
                            ->label('Deadline Pendaftaran')
                            ->required()
                            ->before('start_date'),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('Foto')
                            ->image()
                            ->disk('public')
                            ->directory('internships')
                            ->visibility('public')
                            ->preserveFilenames()
                            ->maxSize(1024)
                            ->acceptedFileTypes(['image/*'])
                            ->columnSpanFull(),
                        
                        Forms\Components\RichEditor::make('benefits')
                            ->label('Benefits')
                            ->required()
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('contact_person')
                            ->label('Nama Contact Person')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('contact_email')
                            ->label('Email Contact Person')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('contact_phone')
                            ->label('No. Telepon Contact Person')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                            ])
                            ->required()
                            ->default('active'),
                        
                        Forms\Components\TextInput::make('apply_url')
                            ->label('Link Pendaftaran')
                            ->url()
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Posisi')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('company')
                    ->label('Perusahaan')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('duration')
                    ->label('Durasi')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('deadline')
                    ->label('Deadline')
                    ->date('d M Y')
                    ->sortable(),
                
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto')
                    ->rounded()
                    ->size(50),
                
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'active',
                        'danger' => 'inactive',
                    ]),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInternships::route('/'),
            'create' => Pages\CreateInternship::route('/create'),
            'edit' => Pages\EditInternship::route('/{record}/edit'),
        ];
    }
}
