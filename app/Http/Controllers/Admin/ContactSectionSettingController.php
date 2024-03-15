<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSectionSetting;
use Illuminate\Http\Request;

class ContactSectionSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = ContactSectionSetting::first();
        return view('admin.contact.setting.index', compact('setting'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        ContactSectionSetting::updateOrCreate(
            ['id' => $id],
            $request->validate([
                'title' => 'required|max:50',
                'sub_title' => 'required|max:550'
            ])
        );

        toastr('Contact Setting Field Updated', 'success');
        return redirect()->back();

    }//End Method

}
