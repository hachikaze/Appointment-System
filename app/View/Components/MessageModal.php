<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class MessageModal extends Component
{
    public $modalid;
    public $route;
    public $title;
    public $userToEmail;
    public $userFromEmail;

    public function __construct($modalid, $route, $title, $userToEmail, $userFromEmail)
    {
        $this->modalid = $modalid;
        $this->route = $route;
        $this->title = $title;
        $this->userToEmail = $userToEmail;
        $this->userFromEmail = $userFromEmail;

    }

    public function render()
    {
        return view('components.message-modal');
    }
}