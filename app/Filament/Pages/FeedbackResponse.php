<?php

namespace App\Filament\Pages;

use App\Class\RoleManager;
use Filament\Pages\Page;
use App\Models\FeedbackResponse as FeedbackResponseModel;

class FeedbackResponse extends Page
{
//    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.feedback-response';

    protected static ?string $navigationGroup = 'Feedback';

    public $feedback = [];
    public static function canAccess(): bool
    {
        return RoleManager::getAcl('feedback', auth()->user()->role, 'view');
    }
    public function mount(): void
    {
        $data = FeedbackResponseModel::get()->groupBy('question')
            ->map(function ($items) {
                $type = $items->first()['type'];

                if ($type === 'range' || $type === 'select') {
                    return [
                        'type' => $type,
                        'data' => $items->groupBy('response')->map->count(),
                    ];
                }

                return [
                    'type' => $type,
                    'data' => $items->pluck('response'),
                ];
            });

        $this->feedback = $data;
    }

    public function showResponse($question)
    {
        $this->dispatch('show-response', question: $question);
    }

    protected function getHeaders(): array
    {
        return [
            'breadrumbs' => $this->getBreadcrumbs(),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '#' => 'Feedback',
            '' => 'Form'
        ];
    }
}
