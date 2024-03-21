<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seoSetting = SeoSetting::first();

        return view('admin.setting.seo-setting.index', compact('seoSetting'));

    }//End method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        SeoSetting::updateOrCreate(
            ['id' => $id],

            $request->validate([
                'title' => 'nullable|max:200',
                'description' => 'nullable|max:500',
                'keywords' => 'nullable|max:300',
            ])
        );
        
        toastr('Successfully Updtaed.', 'success');
        return redirect()->back();
    }
}
