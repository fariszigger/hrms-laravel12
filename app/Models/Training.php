<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 
        'description', 
        'start_date', 
        'end_date',
        'location', 
        'trainer_name', 
        'trainer_email', 
        'trainer_phone',
        'type', 
        'resource_link'
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_training')
                    ->withPivot(['attended_at', 'status'])
                    ->withTimestamps();
    }
}
