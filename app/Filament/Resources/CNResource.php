<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CNResource\Pages;
use App\Filament\Resources\CNResource\RelationManagers;
use App\Models\CN;
use Filament\Forms;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CNResource extends Resource
{
    protected static ?string $model = CN::class;
    protected static ?string $label = 'CNs';
    protected static ?string $navigationIcon = 'heroicon-o-squares-plus';
    protected static ?string $navigationGroup = 'Resources';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('CN-number')
                    ->label('CN-Number')
                    ->tel()
                    ->maxLength(8)
                    ->minLength(7)
                    ->placeholder('Enter the CN number')
                    ->required(),

                TextInput::make('start_range')
                    ->label('Start Range')
                    ->numeric()
                    ->placeholder('ex: 21293400')
                    ->maxLength(8)
                    ->minLength(7)
                    ->required(),

                TextInput::make('end_range')
                    ->label('End Range')
                    ->placeholder('ex: 21293419')
                    ->gt('start_range')
                    ->required(),

                TagsInput::make('Hunt_Group')
                    ->label('Hunt Group')
                    ->placeholder('Enter the Hunt Group')
                    ->suggestions(CN::all()->pluck('Hunt_Group')->flatten()->toArray())
                    ->required(),
                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateActions([
                Tables\Actions\Action::make('create')
                    ->label('Create CN')
                    ->url(route('filament.admin.resources.c-n-s.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->columns([
                TextColumn::make('CN-number')
                    ->label('CN Number')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('start_range')
                    ->label('Start Range')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('end_range')
                    ->label('End Range')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('Hunt_Group')
                    
                    ->searchable()
                    ->badge()
                    ->separator(',')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label(''),
                Tables\Actions\DeleteAction::make()->label(''),
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
            'index' => Pages\ListCNS::route('/'),
            'create' => Pages\CreateCN::route('/create'),
            'edit' => Pages\EditCN::route('/{record}/edit'),
        ];
    }
}
