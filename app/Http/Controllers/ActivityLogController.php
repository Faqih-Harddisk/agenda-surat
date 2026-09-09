<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Http\Controllers\Controller;

class ActivityLogController extends Controller
{
    public function index()
    {
        $logs = ActivityLog::latest()->get();
        return view('admin.log', compact('logs'));
    }
}
