<?php

namespace App\Livewire;

use Filament\Widgets\ChartWidget;

class FeedbackChart extends ChartWidget
{
//    protected static ?string $heading = 'Chart';

    public array  $data;

    protected static ?array $options = [
        'plugins' => [
            'legend' => [
                'display' => false,
            ],
        ],
    ];

    protected function getData(): array
    {
        $datasets = [];
        foreach ($this->data as $key => $value) {
            $datasets['label'][] = $key;
            $datasets['value'][] = $value;
        }
        return [
            'datasets' => [
                [
                    'data' => $datasets['value'],
                ],
            ],
            'labels' => $datasets['label'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

}
