<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FeedbackDataTable;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FeedbackDataTable $dataTable)
    {
        return $dataTable->render('admin.feedback.index');

    }//End method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.feedback.create');

    }//End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Feedback::create($request->validate([
            'name'          => 'required|max:50',
            'position'      => 'required|max:50',
            'description'   => 'required|max:1016',
        ]));

        
        toastr()->success('Feedback Created Successfully.', 'Success');
        return to_route('admin.feedback.index');
        
    }//End Method

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        return view('admin.feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        $feedback->update($request->validate([
            'name'          => 'required|max:50',
            'position'      => 'required|max:50',
            'description'   => 'required|max:1016',
        ]));
        
        toastr()->success('Feedback Updated Successfully.', 'Success');
        return to_route('admin.feedback.index');

    }//End Method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        
        $feedback->delete();
        return true;
        redirect()->back();

    }//End Method
}
