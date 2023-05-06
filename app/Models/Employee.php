<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Employee extends Model
{
    use HasFactory;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'employee_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'mobile_no', 'department_id', 'status', 'task_id','task_start_at'];
    /**
     * Get the deparment associated with the employee.
     */
    public function department()
    {
        return $this->hasOne(Department::class, 'department_id', 'department_id');
    }
}
