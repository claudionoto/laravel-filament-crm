<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AccountResource\Pages;
use App\Filament\Resources\AccountResource\RelationManagers;
use App\Models\Account;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AccountResource extends Resource
{
    protected static ?string $model = Account::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Anagraphics';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->label('Nome'),
                TextInput::make('surname')->required()->label('Cognome'),
                TextInput::make('email')->email()->required()->label('Email'),
                Select::make('level')->options([
                    'gestione' => 'Gestione',
                    'struttura' => 'Struttura',
                    'agente' => 'Agente'
                ])->native(false)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->searchable(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('surname')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable()->url(fn($record) => 'mailto:'.$record->email),
                Tables\Columns\TextColumn::make('level')->searchable()->label('Level'),
                Tables\Columns\TextColumn::make('area_manager_id')->getStateUsing(function ($record): string {
                    $response = '';
                    $user = Account::find($record->area_manager_id);
                    if($user){
                        $response = $user->name.' '.$user->surname;
                    }
                    return $response;
                })->searchable()->label('Area Manager'),
                Tables\Columns\TextColumn::make('structure_id')->getStateUsing(function ($record): string {
                    $response = '';
                    $user = Account::find($record->structure_id);
                    if($user){
                        $response = $user->name.' '.$user->surname;
                    }
                    return $response;
                })->searchable()->label('Struttura'),
                
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
            'index' => Pages\ListAccounts::route('/'),
            'create' => Pages\CreateAccount::route('/create'),
            'edit' => Pages\EditAccount::route('/{record}/edit'),
        ];
    }
}
