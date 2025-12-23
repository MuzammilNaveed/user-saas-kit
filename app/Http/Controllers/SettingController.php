<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function update(Request $request)
    {
        $input = $request->except(['_token', '_method', 'tab']);
        $service = \App\Services\SettingService::make();

        foreach ($input as $key => $value) {
            // Check if it's a file upload
            if ($request->hasFile($key)) {
                $path = $request->file($key)->store('settings', 'public');
                $service->set($key, $path, 'general', 'file');
                continue;
            }

            $service->set($key, $value);
        }

        return back()->with('success', 'Settings updated successfully.');
    }
}
