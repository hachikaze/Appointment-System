<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalAppointmentModal extends Component
{
    public $modalId;
    public $title;
    public $route;
    public $dateSelected;
    public $timeslot;

    /**
     * Create a new component instance.
     */
    public function __construct($modalId, $title, $route, $dateSelected, $timeslot)
    {
        $this->modalId = $modalId;
        $this->title = $title;
        $this->route = $route;
        $this->dateSelected = $dateSelected;
        $this->$timeslot = $timeslot;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.modal-appointment-modal');
    }
}
