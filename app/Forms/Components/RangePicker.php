<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class RangePicker extends Field
{
    protected string $view = 'forms.components.range-picker';

    protected int $min = 1;
    protected int $max = 5;


    public function min(int $value): static
    {
        $this->min = $value;
        return $this;
    }

    public function max(int $value): static
    {
        $this->max = $value;
        return $this;
    }


    public function getMin(): int
    {
        return $this->min;
    }

    public function getMax(): int
    {
        return $this->max;
    }
}
