<?php


namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $title;
    public $message;
    public $route;
    public $buttonText;

    public function __construct($title, $message, $route, $buttonText = 'Confirm')
    {
        $this->title = $title;
        $this->message = $message;
        $this->route = $route;
        $this->buttonText = $buttonText;
    }

    public function render()
    {
        return view('components.modal');
    }
}

