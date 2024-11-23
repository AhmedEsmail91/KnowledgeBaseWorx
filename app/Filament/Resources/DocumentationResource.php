<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentationResource\Pages;
use App\Filament\Resources\DocumentationResource\RelationManagers;
use App\Models\Account;
use App\Models\Documentation;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Markdown;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class DocumentationResource extends Resource
{
    protected static ?string $model = Documentation::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columnSpan(1)
                    ->schema([
                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->placeholder('Title'),
                            FileUpload::make('pdf')
                                ->disk('public')->directory('documentations')
                                ->label('Pdf')
                                ->acceptedFileTypes(['application/pdf'])
                                ->required(),
                            Select::make(name: 'section_id')
                                ->label('Section')
                                ->relationship('section','title') 
                                ->visible(function(){
                                    return Auth::user()->section->id===5;})
                                // ->selectablePlaceholder(true)
                                ->required()
                            ]),

                            
                Section::make()
                    ->schema([
                        TagsInput::make('description')
                            ->label('Description Tags')
                            ->suggestions([
                                'Adding User to ....',
                                'Testing ....',
                                '....(tool).... Documentations'
                            ])
                            ->required(),

                        Section::make('Account')
                        ->description('(Optional)')
                        ->collapsed()
                            ->label('Special Doc')
                            ->schema([
                                Select::make('special')
                                    ->label('Account')
                                    ->relationship('account','name')
                            ])
                        
                    ])->columnSpan(1)
    
                
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->label('Title'),
                TextColumn::make('account.name')
                    ->label('Special Account')
                    ->sortable()
                    ->default('General')
                    ,
                TextColumn::make('section.title')
                    ->label('Specialization'),
                
                
                TextColumn::make('user.name')
                    ->label('Created By')
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Description')
                    ->separator(',')
                    ->badge()
                    ->searchable()
                    , 
                    
            ])
            ->filters([
                SelectFilter::make('special')
                    ->label('Account')
                    ->relationship('account', 'name')
                    ->options(
                Account::query()
                            ->pluck('name', 'id')
                            ->all()
                    )
                    ->searchable()
                    ->preload()
                    ,
            ])
            ->actions([
                Tables\Actions\Action::make('Download')->label('')
                ->url(fn (Documentation $doc): string => route('downloadDoc',$doc->id))
                ->icon('heroicon-m-arrow-down-tray'),
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
            'index' => Pages\ListDocumentations::route('/'),
            'create' => Pages\CreateDocumentation::route('/create'),
            'edit' => Pages\EditDocumentation::route('/{record}/edit'),
        ];
    }
}
