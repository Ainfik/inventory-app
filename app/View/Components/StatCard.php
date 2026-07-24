<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatCard extends Component
{
    public string $title;
    public string $value;
    public string $icon;
    public string $color;


    public function __construct(
        string $title,
        string $value,
        string $icon = 'chart',
        string $color = 'indigo'
    ) {
        $this->title = $title;
        $this->value = $value;
        $this->icon = $icon;
        $this->color = $color;
    }


    public function render(): View|Closure|string
    {
        return view('components.stat-card');
    }
}