<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Games;
use App\Models\Genres;
use App\Models\Article;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ArticleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ArticleResource\RelationManagers;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('title')->required()->placeholder('Title'),
            TextInput::make('author')->required()->placeholder('Author'),
            RichEditor::make('content')->columnSpan(2),
            TextInput::make('image')->url()->label('Image')->placeholder('Enter URL')->columnSpan(2),
            Select::make('game_id')
                ->label('Game')
                ->options(Games::all()->pluck('name', 'id'))
                ->reactive()
                ->afterStateUpdated(function (callable $set, $state) {
            $set('genre_id', null); // Reset genre selection
                }),
            Select::make('genre_id')
                ->label('Genre')
                ->options(function (callable $get) {
                    $gameId = $get('game_id');
                    return Genres::whereIn('id', function ($query) use ($gameId) {
                        $query->select('genre_id')
                            ->from('game_genres')
                            ->where('game_id', $gameId);
                    })->pluck('name', 'id');
                })
                ->required(),
           
        ]);
}
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('author'),
                TextColumn::make('game.name')->label('Game')->searchable(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
