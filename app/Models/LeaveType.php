<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    protected $fillable = array('leave_type', 'description');

    public function leaveDraft()
    {
        return $this->hasOne(LeaveDraft::class, 'id', 'leave_type_id');
    }
}
