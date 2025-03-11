<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AuditModal extends Component
{
    public $modalid;
    public $title;

    public function __construct($modalid, $title)
    {
        $this->modalid = $modalid;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.audit-modal');
    }
}
