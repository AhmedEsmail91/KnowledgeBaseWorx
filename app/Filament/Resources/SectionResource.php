<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionResource\Pages;
use App\Filament\Resources\SectionResource\RelationManagers;
use App\Models\Section;
use App\Models\User;

use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SectionResource extends Resource
{
    protected static ?string $model = Section::class;
    protected static ?string $modelLabel = 'IT Sections';
    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $navigationGroup = 'Operation';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Section Title')
                    ->required()
                    ->placeholder('Enter the title of the section'),
                MarkdownEditor::make('section description')
                    ->label('Section Description')
                    ->required()
                    ->placeholder('Write your content here')
                    ->hint('Must be at most 500 characters, and dot(.) delimited')
                    // ->description('Must be Delimited by dot (.)')
                    ->maxLength(500), // Set maximum words or characters
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Section Title')
                    ->sortable(),
                Tables\Columns\TextColumn::make('section description')
                    ->label('Section Description')
                    ->words(7)
                    ->badge()
                    ->separator('.')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('download')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->label(' ')->url(
                            fn (Section $section) => route('section.download', $section)
                        )
                
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
            'index' => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit' => Pages\EditSection::route('/{record}/edit'),
        ];
    }
}
