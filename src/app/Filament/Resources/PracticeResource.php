<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PracticeResource\Pages;
use App\Filament\Resources\PracticeResource\RelationManagers;
use App\Models\Account;
use App\Models\Practice;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PracticeResource extends Resource
{
    protected static ?string $model = Practice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Operations';
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
                TextColumn::make('id')->searchable(),
                TextColumn::make('account')->getStateUsing(function($record): string {
                    return $record->account->full_name;
                })->searchable(query: function ($query, $search) {
                    $query->orWhereHas('account', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%")
                              ->orWhere('surname', 'like', "%{$search}%")
                              ->orWhereRaw("CONCAT(name, ' ', surname) LIKE ?", ["%{$search}%"]);
                    });
                }),
                TextColumn::make('customer')->getStateUsing(function ($record) :string {
                    return $record->customer->fiscal_name;
                }),
                TextColumn::make('status')->getStateUsing(function ($record) {
                    $statuses = Practice::getPracticeStatuses();
                    return $statuses[$record->status];
                }),
                TextColumn::make('product.name')->searchable(),
                TextColumn::make('created_at')->getStateUsing(function($record): string {
                    return Carbon::createFromDate($record->created_at)->format('d-m-Y H:i:s');
                })->label('Creation Date')
            ])
            ->filters([
                /*SelectFilter::make('full_name')
                ->label('Full Name')
                ->options(function () {
                    return Account::getAllFullNames();
                })
                ->query(function ($query) {
                    $value = request()->input('filters.full_name');
                    $query->whereHas('account', function ($query) use ($value) {
                        $query->where('full_name', $value);
                    });
                }),*/
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
            
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPractices::route('/'),
            'create' => Pages\CreatePractice::route('/create'),
            'edit' => Pages\EditPractice::route('/{record}/edit'),
        ];
    }
}
