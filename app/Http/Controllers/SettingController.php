<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
    	$setting = Setting::first();
    	return view('pages.setting.index', compact('setting'));
    }

    public function store(Request $request)
    {
    	// return $request->all();
    	$setting = Setting::updateOrCreate(['id' => 1], $request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Updated Successfully',
        ]);

        return redirect()->route('admin.setting');
    }
}
