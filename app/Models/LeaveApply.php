<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveApply extends Model
{
    public function leaveTypeApply()
    {
        return $this->hasOne(LeaveTypeApply::class, 'leave_apply_id', 'id');
    }
}
