<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function userrole()
    {
        return $this->hasOne(UserRole::class, 'user_id', 'id');
    }

    public function employeeLeaves()
    {
        return $this->hasMany(EmployeeLeave::class, 'user_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
