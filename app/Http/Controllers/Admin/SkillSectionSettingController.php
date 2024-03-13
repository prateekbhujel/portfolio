<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioSectionSetting;
use App\Models\SkillSectionSetting;
use Illuminate\Http\Request;

class SkillSectionSettingController extends Controller
{
    /**
     * Display a listing of the resource.   
     */
    public function index()
    {
        $skillSetting = SkillSectionSetting::first();

        return view('admin.skill-section.setting.index', compact('skillSetting'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'         => 'required|max:200',
            'sub_title'     => 'required|max:1600',
            'image'         => 'image|max:5000|mimes:jpeg,png,webp',
        ]);
        
        $skill = SkillSectionSetting::first();
        $imagePath  = handleUpload('image', $skill);

         SkillSectionSetting::updateOrCreate(
            [
                'id'         => $id
            ],
            [
                'title'       => $request->title,
                'sub_title'   => $request->sub_title,
                'image'       => (!empty($imagePath) ? $imagePath : $skill->image),
            ]
         );
    
         toastr()->success('Skill Updated Successfully.', 'Congrats');
         return redirect()->back();

    }//End Method

}
