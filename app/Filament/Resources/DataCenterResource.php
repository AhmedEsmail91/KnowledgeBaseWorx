<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataCenterResource\Pages;
use App\Filament\Resources\DataCenterResource\RelationManagers;
use App\Models\Branch;
use App\Models\DataCenter;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataCenterResource extends Resource
{
    protected static ?string $model = DataCenter::class;
    protected static ?string $navigationGroup = 'Infrastructure';
    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('rack')
                    ->label('Rack Number')
                    ->numeric()
                    ->required()
                    ->placeholder('Rack Number'),
                Select::make('branch_id')
                    ->label('Branch')
                    ->options(
                        Branch::query()
                            ->pluck('name', 'id')
                            ->all()
                    )
                    ->required(),
                Select::make('items')
                    ->label('Items')
                    
                    ->options(
                        Item::query()
                            ->orderBy('created_at', 'desc')
                            ->pluck('item_desc_name', 'id')
                            ->all()
                    )->preload()
                    ->multiple()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateActions([
                Tables\Actions\Action::make('create')
                    ->label('Create DataCenter')
                    ->url(route('filament.admin.resources.data-centers.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->columns([
                TextColumn::make('branch.name')
                    ->label('Branch')
                    ->icon('heroicon-o-building-office-2'),
                TextColumn::make('items.name')
                    ->label('Items')
                    ->badge()
                    ->separator(','),
                TextColumn::make('rack')
                    ->searchable()
                    ->sortable(), 
            ])
            ->filters([
                //
                SelectFilter::make('branch_id')
                    ->label('Branch')
                    ->relationship('branch', 'name')
                    ->options(
                        Branch::query()
                            ->pluck('name', 'id')
                            ->all()
                    ),
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
            'index' => Pages\ListDataCenters::route('/'),
            'create' => Pages\CreateDataCenter::route('/create'),
            'edit' => Pages\EditDataCenter::route('/{record}/edit'),
        ];
    }
}
