<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ReviewModal extends Component
{
    public $modalId;
    public $route;
    public $services;

    public function __construct($modalId, $route, $services)
    {
        $this->modalId = $modalId;
        $this->route = $route;
        $this->services = $services;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.review-modal');
    }
}
