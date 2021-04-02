<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Employee;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $details = Employee::where('user_id', $request->user()->id)->with('userrole.role')->first();

        $now = Carbon::now();

        $events = Event::where('date', '>', $now)
            ->latest('date')
            ->take(3)
            ->get()
            ->all();

        return view('hrms.profile', compact('details', 'events'));
    }
}
