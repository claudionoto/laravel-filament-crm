<?php

namespace App\Filament\Widgets;

use App\Models\Practice;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PracticeCharts extends ChartWidget
{
    protected static ?string $heading = 'Practices per mounth';

    protected int | string | array $columnSpan = 'full';
    protected static ?string $maxHeight = '200px';
    protected function getData(): array
    {
        $practice = Practice::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('count(*) as count')
        )
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        // Prepara i dati per il grafico
        $labels = $practice->pluck('month')->toArray();
        $data = $practice->pluck('count')->toArray();
        return [
            'datasets' => [
                [
                    'label' => 'Number of practices',
                    'data' => $data,
                    'borderColor' => '#f87979',
                    'backgroundColor' => 'rgba(248, 121, 121, 0.2)',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
