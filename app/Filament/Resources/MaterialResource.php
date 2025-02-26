<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaterialResource\Pages;
use App\Models\Material;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class MaterialResource extends Resource
{
    protected static ?string $model = Material::class;

    protected static ?string $navigationGroup = 'Manajemen Perkuliahan';

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    
    protected static ?string $navigationLabel = 'Materi Kuliah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('course_id')
                    ->relationship('course', 'name')
                    ->label('Mata Kuliah')
                    ->required()
                    ->searchable(),
                    
                Forms\Components\TextInput::make('title')
                    ->label('Judul Materi')
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->maxLength(65535),
                    
                Forms\Components\FileUpload::make('file_path')
                    ->label('File')
                    ->required()
                    ->acceptedFileTypes([
                        'application/pdf', // PDF
                        'application/msword', // DOC
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // DOCX
                        'application/vnd.ms-excel', // XLS
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' // XLSX
                    ])
                    ->directory('materials')
                    ->preserveFilenames()
                    ->maxSize(10240) // 10MB
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $set('file_name', $state->getClientOriginalName());
                            $set('file_type', $state->getClientOriginalExtension());
                            $set('file_size', $state->getSize());
                        }
                    }),
                    
                Forms\Components\Hidden::make('file_name'),
                Forms\Components\Hidden::make('file_type'),
                Forms\Components\Hidden::make('file_size'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course.name')
                    ->label('Mata Kuliah')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('file_type')
                    ->label('Tipe File')
                    ->badge()
                    ->formatStateUsing(fn (string $state) => strtoupper($state)),
                    
                Tables\Columns\TextColumn::make('file_size')
                    ->label('Ukuran')
                    ->formatStateUsing(fn (int $state) => number_format($state / 1024 / 1024, 2) . ' MB'),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Upload')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('course_id')
                    ->relationship('course', 'name')
                    ->label('Mata Kuliah'),
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
            'index' => Pages\ListMaterials::route('/'),
            'create' => Pages\CreateMaterial::route('/create'),
            'edit' => Pages\EditMaterial::route('/{record}/edit'),
        ];
    }    
}