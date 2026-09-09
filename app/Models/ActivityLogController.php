<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLogController extends Model
{
    $logs = ActivityLog::latest()->get(); retrun view('admin.logs', compact('logs'));
}
