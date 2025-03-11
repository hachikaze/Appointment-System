<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pagination extends Component
{
    public $paginator;

    /**
     * Create a new component instance.
     */
    public function __construct($paginator= null) // Allow nullable value
    {
        $this->paginator = $paginator;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.pagination');
    }
}