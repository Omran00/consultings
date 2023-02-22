<?php

namespace App\Http\Controllers\Consulting;

use App\Models\Consulting;
use App\Http\Controllers\Controller;

class ConsultingController extends Controller
{
    public function index()
    {
        $consultings = Consulting::all();
        return response([
            'consultings' => $consultings
        ]);
    }
}
