<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KasperskyResource\Pages;
use App\Filament\Resources\KasperskyResource\RelationManagers;
use App\Models\Kaspersky;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KasperskyResource extends Resource
{
    protected static ?string $navigationGroup = 'Resources';
    protected static ?string $model = Kaspersky::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Ip')
                    ->label('Ip')
                    ->sortable(),
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
            'index' => Pages\ListKasperskies::route('/'),
            'create' => Pages\CreateKaspersky::route('/create'),
            'edit' => Pages\EditKaspersky::route('/{record}/edit'),
        ];
    }
}
