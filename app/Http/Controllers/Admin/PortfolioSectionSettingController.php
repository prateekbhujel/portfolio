<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioSectionSetting as Setting;

class PortfolioSectionSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();

        return view('admin.protfolio.setting.index', compact('setting'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        Setting::updateOrCreate(
            ['id' => $id],
            
            $request->validate([
            'title'     => 'required|min:2|max:200',
            'sub_title' => 'required|min:20|max:500',
            ])
        );

        toastr()->success('Setting Updated Succcessfully.','Congrates');
        return redirect()->back();
    }//End Method

}
