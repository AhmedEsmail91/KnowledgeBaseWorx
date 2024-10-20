<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AheevaResource\Pages;
use App\Filament\Resources\AheevaResource\RelationManagers;
use App\Models\Aheeva;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AheevaResource extends Resource
{
    protected static ?string $navigationGroup = 'Resources';

    protected static ?string $model = Aheeva::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone-arrow-up-right';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ip')
                    ->label('IP')
                    ->ipv4()
                    ->required()
                    ->placeholder('Enter the IP address of the Aheeva server')
                    ->columnSpan(1),
                TextInput::make('version')
                    ->label('Version')
                    ->numeric()
                    ->required()
                    ->placeholder('Enter the version number of the Aheeva server')
                    ->columnSpan(1),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ip')
                    ->label('IP')
                    
                    ->sortable(),
                TextColumn::make('version')
                    ->label('Version')
                    
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListAheevas::route('/'),
            'create' => Pages\CreateAheeva::route('/create'),
            'edit' => Pages\EditAheeva::route('/{record}/edit'),
        ];
    }
}
