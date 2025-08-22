<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Training;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->get();
        return view('components.employee', compact('employees'));
    }

    public function create()
    {
        return view('components.employee.employee-create');
    }

    public function training()
    {
        $trainings = Training::latest()->get();
        return view('components.training', compact('trainings'));
    }
}

