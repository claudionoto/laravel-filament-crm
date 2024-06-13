<?php

namespace App\Filament\Widgets;

use App\Models\Practice;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class PracticeWidgets extends BaseWidget
{
    protected function getStats(): array
    {
        return [
           Stat::make('Total Practices', Practice::count()),
           Stat::make('Done Practices',function(){
                $totalPractices = Practice::count();
                $completedPractices = Practice::where('status',3)->count();
                $value = ($completedPractices/$totalPractices) *100;
                return $value.'%';
           }),
           Stat::make('Processing Practices', function () {
            $totalPractices = Practice::count();
                $completedPractices = Practice::where('status',2)->count();
                $value = ($completedPractices/$totalPractices) *100;
                return $value.'%';
           }),

           Stat::make('Best Account',function(){
            $practiceAccount = Practice::select('id_account', DB::raw('count(*) as practice_count'))
            ->where('status',3)
            ->groupBy('id_account')
            ->orderBy('practice_count', 'desc')
            ->first();
            return $practiceAccount->account->full_name .' ('.$practiceAccount->practice_count.') practices';
           }),
          
        ];
    }
}
