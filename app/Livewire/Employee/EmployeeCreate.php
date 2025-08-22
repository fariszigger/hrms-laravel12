<?php

namespace App\Livewire\Employee;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use App\Models\Training;

class EmployeeCreate extends Component
{
    public $showModal = false;

    #[Validate]
    public $name = '';

    #[Validate]
    public $phone = '';

    #[Validate]
    public $gender = '';

    #[Validate]
    public $address = '';

    #[Validate]
    public $pob = '';

    #[Validate]
    public $dob = '';

    #[Validate]
    public $married = '';

    #[Validate]
    public $emergency_contact_name = '';

    #[Validate]
    public $emergency_contact_phone = '';

    #[Validate]
    public $emergency_contact_relationship = '';

    #[Validate]
    public $hire_date = '';

    #[Validate]
    public $salary = '';

    #[Validate]
    public $bonus = '';

    #[Validate]
    public $termination_date = '';

    #[Validate]
    public $education = '';

    #[Validate]
    public $previous_employment = '';

    #[Validate]
    public $skills = '';

    #[Validate]
    public $performance_reviews = '';

    #[Validate]
    public $notes = '';

    #[Validate]
    public $kk_number = '';

    #[Validate]
    public $bpjskes_number = '';

    #[Validate]
    public $bpjsket_number = '';

    #[Validate]
    public $code, $email, $department_id = '';

    public function mount()
    {
        $this->roles = Department::all();
        $this->positions = Position::all();
        $this->trainings = Training::all();
    }

    public function rules()
    {
        return [
            // Basic info
            'code'      => 'required|string|unique:employees,code|max:50',
            'name'      => 'required|string|min:2|max:255',
            'email'     => 'required|email|unique:employees,email|max:255',
            'phone'     => 'required|string|regex:/^[0-9+\-()\s]+$/|unique:employees,phone|max:20',
            'gender'    => 'required|in:Male,Female',
            'address'   => 'required|string|min:5|max:255',
            'pob'       => 'required|string|min:2|max:255', // place of birth
            'dob'       => 'required|date|before:today',
            'married'   => 'required|boolean',

            // Emergency Contact
            'emergency_contact_name'          => 'nullable|string|min:2|max:255',
            'emergency_contact_phone'         => 'nullable|string|regex:/^[0-9+\-()\s]+$/',
            'emergency_contact_relationship'  => 'nullable|string|max:100',

            // Employment
            'department_id'       => 'required|exists:departments,id',
            'hire_date'           => 'required|date|before_or_equal:today',
            'termination_date'    => 'nullable|date|after:hire_date',

            // Financial
            'salary'   => 'required|numeric|min:0',
            'bonus'    => 'nullable|numeric|min:0',

            // Career & Records
            'education'            => 'nullable|string|max:255',
            'previous_employment'  => 'nullable|string|max:255',
            'skills'               => 'nullable|string|max:500',
            'performance_reviews'  => 'nullable|string|max:500',
            'notes'                => 'nullable|string|max:1000',

            // Government / HR IDs
            'kk_number'       => 'nullable|string|max:50|unique:employees,kk_number',
            'bpjskes_number'  => 'nullable|string|max:50|unique:employees,bpjskes_number',
            'bpjsket_number'  => 'nullable|string|max:50|unique:employees,bpjsket_number',
        ];
    }

    public function updatedName($value)
    {
        $this->name = ucwords(strtolower($value));
    }

    public function save()
    {
        $validated = $this->validate();

        Employee::create($validated);

        session()->flash('status', 'Employee berhasil disimpan!');

        // Reset all form fields
        $this->reset([
            'name',
            'phone',
            'gender',
            'address',
            'pob',
            'dob',
            'married',
            'emergency_contact_name',
            'emergency_contact_phone',
            'emergency_contact_relationship',
            'hire_date',
            'salary',
            'bonus',
            'termination_date',
            'education',
            'previous_employment',
            'skills',
            'performance_reviews',
            'notes',
            'kk_number',
            'bpjskes_number',
            'bpjsket_number',
            'code',
            'email',
            'department_id',
        ]);

        // Redirect to employee index page (change route name if needed)
        return redirect()->route('employees.index');
    }

    public function render()
    {
        return view('livewire.employee.employee-create');
    }
}
