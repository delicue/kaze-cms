<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('slug')
                    ->prefix('/')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->label('Author')
                    ->options(User::all()->pluck('name', 'id'))
                    ->native(false)
                    ->searchable(),
                Forms\Components\TextInput::make('title')
                    ->placeholder('Post title')
                    ->required(),
                Forms\Components\RichEditor::make('content')
                    ->disableGrammarly()
                    ->columnSpanFull(),
                Forms\Components\Select::make('category_id')
                    ->label('Category')
                    ->nullable()
                    ->options(Category::all()->pluck('name', 'id'))
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->unique(),
                    ])
                    //Allow creation of new category
                    ->createOptionUsing(function (array $data): int {
                        return DB::table('categories')
                            ->insert([
                                'name' => $data['name'],
                            ]);
                    })
                    ->searchable()
                    ->native(false),
                Forms\Components\Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'reviewing' => 'Reviewing',
                        'published' => 'Published',
                    ])
                    ->default('draft')
                    ->native(false)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slug')
                    ->prefix('/')
                    ->searchable(),
                Tables\Columns\TextColumn::make('author_id')
                    ->label('Author')
                    ->state(function ($record) {
                        return $record->author->name;
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category_id')
                    ->label('Category')
                    ->state(function ($record) {
                        return $record->category->name;
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
            'view' => Pages\ViewPost::route('/{record}/view'),
        ];
    }
}
