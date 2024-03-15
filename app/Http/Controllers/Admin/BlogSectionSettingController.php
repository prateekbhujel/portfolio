<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogSectionSetting;
use Illuminate\Http\Request;

class BlogSectionSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogSectionSetting = BlogSectionSetting::first();
        return view('admin.blog.setting.index', compact('blogSectionSetting'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        BlogSectionSetting::updateOrCreate(
            ['id' => $id],

            $request->validate([
                'title' => ['required', 'max:100'],
                'sub_title' => ['required', 'max:520']
            ])
        );

        toastr('Blog Setting Updated.', 'success');
        return redirect()->back();

    }//End Method


}
