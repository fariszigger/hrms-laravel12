<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeRelative extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'employee_id',
        'relative_status',
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'pob',
        'dob',
        'married',
        'ktp_number',
        'kk_number',
        'sim_number',
        'npwp_number',
        'bpjskes_number',
        'bpjsket_number',
    ];

    protected $casts = [
        'dob' => 'date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
