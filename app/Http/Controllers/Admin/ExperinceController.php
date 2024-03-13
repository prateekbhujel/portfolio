<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experince;
use Illuminate\Http\Request;

class ExperinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experience = Experince::first();

        return view('admin.experience.index', compact('experience'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'image'         => 'image|max:5000|mimes:jpeg,png',
            'title'         => 'required|max:200',
            'description'   => 'required|max:1600',
            'phone'         => 'nullable|max:30',
            'email'         => 'nullable|max:100|email',
        ]);
        
        $experience = Experince::find($id);
        $imagePath  = handleUpload('image', $experience);

         Experince::updateOrCreate(
            [
                'id'         => $id
            ],
            [
                'title'       => $request->title,
                'description' => $request->description,
                'image'       => (!empty($imagePath) ? $imagePath : $experience->image),
                'phone'       => $request->phone,
                'email'       => $request->email,
            ]
         );
    
         toastr()->success('Updated Successfully.', 'Congrats');
         return redirect()->back();

    }//End Method

}
