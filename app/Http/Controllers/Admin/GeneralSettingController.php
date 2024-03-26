<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = GeneralSetting::first();

        return view('admin.setting.general-setting.index', compact('setting'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
        'logo'        => 'nullable|max:5000|image',
        'footer_logo' => 'nullable|max:5000|image',
        'favicon'     => 'nullable|max:5000|image',
       ]);
       
       $setting = GeneralSetting::findOrFail($id);
       $logo        = handleUpload('logo', $setting );
       $footer_logo = handleUpload('footer_logo', $setting );
       $favicon     = handleUpload('favicon', $setting );

       GeneralSetting::updateOrCreate(
        [
            'id'         => $id
        ],
        [
            'logo'          => (!empty($logo) ? $logo : $setting->logo),
            'footer_logo'   => (!empty($footer_logo) ? $footer_logo : $setting->footer_logo),
            'favicon'       => (!empty($favicon) ? $favicon : $setting->favicon),
            'updated_at'    => Carbon::now(),
        ]
     );
       
       toastr('Successfully Updated!', 'success');
       return redirect()->back();

    }//End Method
}
