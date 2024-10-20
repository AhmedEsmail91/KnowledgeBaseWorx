<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;
    protected static ?string $navigationGroup = 'Infrastructure';

    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                Section::make([
                    TextInput::make('name')
                        ->label('Name')
                        ->required()
                        ->placeholder('Name'),
                    Select::make('type')
                        ->label('Type')
                        
                        ->options([
                            'IT' => 'IT',
                            'Network' => 'Network',
                            'Software' => 'Software',
                            'VOIP' => 'VOIP',
                        ])
                    ,
                    TagsInput::make('description')
                        ->label('Description')
                        ->required()
                        ->placeholder('Description')
                        ->hint('The content must be at most 500 characters.')
                ])
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->searchPlaceholder('Search (Name, Desc)')
            ->emptyStateActions([
                Tables\Actions\Action::make('create')
                    ->label('Create item')
                    ->url(route('filament.admin.resources.items.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->limit(20)
                    ,
                TextColumn::make('type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->formatStateUsing(function($state){
                        return stripslashes($state);
                    })->limit(35)
                   
                    ->badge() // Keep badge enabled for the tag styling
                    ->separator(',') // Keep separator for other purposes if needed
                    ->searchable()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since()
                    ->toggleable(true)

            ])->defaultSort('updated_at', 'desc')
            ->filters([
                // filter with select type
                SelectFilter::make('type')
                    ->options([
                        'IT' => 'IT',
                        'Network' => 'Network',
                        'Software' => 'Software',
                        'VOIP' => 'VOIP',
                    ])
                    ->label('Type'),
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
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
