<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AccountResource\Pages;
use App\Filament\Resources\AccountResource\RelationManagers;
use App\Models\Account;
use App\Models\Aheeva;
use App\Models\Branch;
use App\Models\Kaspersky;
use App\Models\cn_lines;
use App\Models\Service;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Markdown;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
class AccountResource extends Resource
{
    protected static ?string $model = Account::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    public static function form(Form $form): Form
    {
        return $form

            ->schema([

                Section::make('Account Information')
                    ->schema( [
                        Group::make()
                            ->schema([
                                TextInput::make('name')
                                    ->label('Name')
                                    //->required()
                                    ,
                                TagsInput::make('job_nature')
                                    ->label('Job Nature')
                                    ->placeholder('Job Nature')
                                    ->suggestions([
                                        'Donation',
                                        'Sales',
                                        'Super-Market',

                                    ])
                                    ->color('info')
                                    //->required()
                                    ,
                            ]),

                        TextInput::make('hotline')
                            ->label('Hotline')
                            ->tel()
                            //->required()
                            ,

                        FileUpload::make('thumbnail')
                            ->disk('local')->directory('/accounts/thumbnails')
                            ->label('Logo')

                            //->required()
                            ,
                    ])
                    // ->collapsible()
                    ->columnSpan(2),

                Section::make('Provides')
                ->schema([

                    Select::make('kaspersky_id')
                        ->label('Kaspersky')
                        ->relationship(
                            name: 'kaspersky',
                            modifyQueryUsing: fn (Builder $query) => $query->orderBy('ip'),)
                        ->getOptionLabelFromRecordUsing(function(Kaspersky $record){
                            return "Connect on -> {$record->Ip}";
                        })
                        //->required()
                        ,
                    Select::make('branch_id')
                        ->label('Branch')

                        ->relationship(
                            name: 'branch',
                            modifyQueryUsing: fn (Builder $query) => $query->orderBy('name'),)
                        ->getOptionLabelFromRecordUsing(function(Branch $record){
                            return Str::limit("{$record->name} Location:: {$record->location}",50,'...');
                        })
//                        ->required()
                        ,
                    Select::make('services')
                        ->label('Services')

                        ->relationship(
                            'services',
                            titleAttribute: 'name',
                            modifyQueryUsing: fn (Builder $query) => $query->orderBy('name'),)
                        ->getOptionLabelFromRecordUsing(function(Service $record){
                            $data=Str::limit("{$record->name} Desc:: {$record->description}",50,'...');
                            return $data;
                        })
                        ->preload()
                        ->multiple()
                        //->required()
                        ,
                        ])->columnSpan(2)->collapsible(),
                Section::make('Connectivity')
                    ->collapsed()
                    ->schema([
                        Select::make("CN.CN-number")
                            ->columnSpan(2)
                            ->multiple()
                            ->preload()
                            ->label('Circuit Number')
                            ->relationship('CN','CN-number'),
//,
                        Section::make('Lines')
                            ->schema([
                                TagsInput::make('Inbound-Lines')
                                    ->label('Inbound')
                                    ->columnSpan(1)
                                    ->placeholder('LineNumber')
                                    ->required(),

                                TagsInput::make('Outbound-Lines')
                                    ->label('Outbound')
                                    ->columnSpan(2)

                                    ->placeholder('LineNumber')
                                    ->required(),
                                Select::make('aheeva_id')
                                    ->label('Aheeva')
                                    ->columnSpan(3)

                                    ->relationship('aheeva','ip'),
                            ])
                            ->columnSpan(3)
                    ])->columns(5),
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateActions([
                Tables\Actions\Action::make('create')
                    ->label('Create Account')
                    ->url(route('filament.admin.resources.accounts.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Logo')
                    ->circular(),
                TextColumn::make('name')
                    // ->primary()
                    ->searchable()
                    ->label('Name')
                    ->sortable(),
                TextColumn::make('job_nature')
                    ->label('Job Nature')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->limit(5)
                    ->color('info')
                    ->searchable()
                    ->badge()
                    ->separator(',')
                    ->sortable(),

                TextColumn::make('hotline')
                    ->searchable()
                    ->label('Hotline')
                    ->sortable(),
                TextColumn::make('branch.name')
                    ->label('Branch')
                    ->limit(5)
                    ->sortable(),
                TextColumn::make('services.name')
                    ->label('Services')
                    ->badge()
                    ->limitList(2)
                    ->separator(',')
                    ->sortable(),
                TextColumn::make('kaspersky.Ip')
                    ->label(label: 'Kaspersky')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                TextColumn::make('aheeva.ip')
                ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable()
                    ->label('Aheeva')
                    ->sortable(),
                TextColumn::make('Inbound-Lines')
                    ->toggleable(isToggledHiddenByDefault: true)
                        ->searchable()
                        ->label('Inbound')
                        ->badge()
                        ->limitList(2)
                        ->color('info')
                        ->separator(',')
                        ->sortable(),
                TextColumn::make('Outbound-Lines')
                    ->toggleable(isToggledHiddenByDefault: true)
                        ->badge()
                        ->limitList(2)
                        ->separator(',')
                        ->searchable()
                        ->color('info')
                        ->label('Outbound')
                        ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label(''),
                Tables\Actions\DeleteAction::make()
                    ->label('')
                ,
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
            'index' => Pages\ListAccounts::route('/'),
            'create' => Pages\CreateAccount::route('/create'),
            'edit' => Pages\EditAccount::route('/{record}/edit'),
        ];
    }
}
