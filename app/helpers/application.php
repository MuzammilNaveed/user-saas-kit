<?php


use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\{DB, File};
use App\Services\ActivityLogService;

if (! function_exists('activity')) {
    function activity(): ActivityLogService
    {
        return ActivityLogService::make();
    }
}


if (!function_exists('database_driver')) {
    function database_driver()
    {
        $driver = DB::getDriverName();
        switch ($driver) {
            case 'pgsql':
                return 'ILIKE';
            default:
                return 'LIKE';
        }
    }
}
