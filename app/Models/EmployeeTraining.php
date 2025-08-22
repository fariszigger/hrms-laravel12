<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeTraining extends Model
{
    use SoftDeletes;

    protected $table = 'employee_training'; // Explicitly define the table name

    protected $fillable = [
        'employee_id',
        'training_id',
        'attended_at',
        'status',
        'notes',
    ];

    // Optional: define relationships back to Employee and Training
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
