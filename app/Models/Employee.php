<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'employee_id',
        'code',
        'user_id',
        'email',
        'phone',
        'address',
        'gender',
        'pob',
        'dob',
        'married',
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relationship',
        'department_id',
        'position_id',
        'employee_type',
        'hire_date',
        'salary',
        'bonus',
        'status',
        'termination_date',
        'previous_addresses',
        'education',
        'previous_employment',
        'skills',
        'performance_reviews',
        'notes',
        'mother_name',
        'ktp_number',
        'kk_number',
        'sim_number',
        'npwp_number',
        'bpjskes_number',
        'bpjsket_number',
        'photo_path',
    ];

    protected $casts = [
        'dob' => 'date',
        'hire_date' => 'date',
        'termination_date' => 'date',
        'previous_addresses' => 'array',
        'salary' => 'decimal:2',
        'bonus' => 'decimal:2',
    ];

    public function relatives()
    {
        return $this->hasMany(EmployeeRelative::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
