<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        $activityLogs = auth()->user()->activityLogs()->latest()->paginate(20);
        return view('activity_log.index', get_defined_vars());
    }

}
