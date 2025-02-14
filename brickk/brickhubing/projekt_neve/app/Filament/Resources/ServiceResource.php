<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Games;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Games::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('name')->required(),
            TextInput::make('icon_class'),
            TextInput::make('short_desc')
                ->label('Short Description')
                ->required()
                ->maxLength(35),
            RichEditor::make('description')->columnSpan(2),
            DatePicker::make('release_date')->format('Y/m/d')->label('Release Date'),
            TextInput::make('donwload_link')->url()->label('Download Link')->placeholder('Enter URL')->columnSpan(2),
            TextInput::make('image_path')->url()->label('Image Path')->placeholder('Enter URL'),
            Select::make('status')->options([
                1 => 'Active',
                0 => 'Block'
            ]),
            Select::make('publisher_id')
                ->label('Publisher')
                ->relationship('publisher', 'name')
                ->required(),
            Select::make('developer_id')
                ->label('Developer')
                ->relationship('developer', 'name')
                ->required(),





        ]);
}
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('short_desc')->label('Short Description')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
