<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Appointment;
use Carbon\Carbon;

class UpdateUnattendedAppointments extends Command
{
    // /* UPDATED: Command signature and description */
    protected $signature = 'appointments:update-unattended';
    protected $description = 'Update pending appointments to unattended if the appointment time has passed';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = \Carbon\Carbon::now();

        // Get all pending appointments
        $appointments = \App\Models\Appointment::where('status', 'Pending')->get();

        foreach ($appointments as $appointment) {
            // e.g. "10:00 AM - 12:00 PM"
            $range = explode('-', $appointment->time);
            
            // "12:00 PM" if there's a dash, otherwise fallback
            $endTimeString = isset($range[1]) ? trim($range[1]) : trim($range[0]);
            
            // Combine date + end time => "2025-02-28 12:00 PM"
            $dateTimeString = $appointment->date . ' ' . $endTimeString;

            // Parse with the correct format: "Y-m-d h:i A"
            $endDateTime = \Carbon\Carbon::createFromFormat('Y-m-d h:i A', $dateTimeString);
            
            // If the end time is in the past, mark it "Unattended"
            if ($endDateTime->isPast()) {
                $appointment->status = 'Unattended';
                $appointment->save();
            }
        }

        $this->info('Unattended appointments updated successfully.');
    }

}
