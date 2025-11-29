<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        $activityLogs = $this->logs();
        return view('activity_log.index', get_defined_vars());
    }


    private function logs()
    {
        return \App\Models\ActivityLog::with('causer')
            ->latest()
            ->paginate(10);
    }
}
