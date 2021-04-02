<?php

namespace App\Repositories;

use App\Models\AttendanceFilename;
use Illuminate\Support\Facades\Session;

class UploadRepository
{

    public function File($file, $description, $date)
    {
        $allowedext = ["xlsx", "xls"];
        $extension = $file->getClientOriginalExtension();
        $filename = $file->getClientOriginalName();
        if (in_array($extension, $allowedext)) {

            //move this file to storage path
            $file->move(storage_path('attendance/'), $filename);

            $attendance_file_name = new AttendanceFilename();
            $attendance_file_name->name = $filename;
            $attendance_file_name->description = $description;
            $attendance_file_name->date = date_format(date_create($date), 'Y-m-d');
            $attendance_file_name->save();

            return $filename;
        } else {
            Session::flash('flash_message', 'Please upload only excel files with xls or xlsx extension');
            return redirect()->back();
        }
    }
}
