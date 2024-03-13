<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeedbackSectionSetting;
use Illuminate\Http\Request;

class FeedbackSectionSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbackSection = FeedbackSectionSetting::first();

        return view('admin.feedback-setting.index', compact('feedbackSection'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        FeedbackSectionSetting::updateOrCreate(
            [
                'id'         => $id
            ],
            $request->validate([
                'title' => 'required|max:100',
                'sub_title' => 'required|max:500',
            ])
        );

        toastr()->success('Feedback Setting Updated Successfully.', 'Congrats');
        return redirect()->back();

    }//End Method

}
