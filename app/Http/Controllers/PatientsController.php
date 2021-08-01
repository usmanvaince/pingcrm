<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class PatientsController extends Controller
{
    public function index()
    {
        return Inertia::render('Patients/Index', [
            'filters' => Request::all('search'),
            'patients' => Patient::orderByName()
                                ->filter(Request::only('search'))
                                ->paginate(10)
                                ->withQueryString()
                                ->through(function ($patient) {
                                    return [
                                        'id' => $patient->id,
                                        'name' => $patient->name,
                                        'email' => $patient->email,
                                        'ssn' => $patient->ssn,
                                    ];
                                }),
        ]);
    }
}
