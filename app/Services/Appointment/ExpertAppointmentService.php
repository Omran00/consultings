<?php 

namespace App\Services\Appointment; 

use App\Models\Expert;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ExpertAppointmentService
{
    public static function get_appointments(Expert $expert) :BelongsToMany
    {
        return $expert->appointments();
    }
}