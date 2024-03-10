<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::all();

        return view('admin.about.index',compact('about'));

    }//End Method


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'         => 'required|max:200',
            'description'   => 'required|max:1600',
            'image'         => 'required|image',
            'resume'        => 'mimes:pdf,csv,txt,docx|max:10000'
        ]);
        
        $about      = About::first();
        $imagePath  = handleUpload('image', $about);
        $resumePath = handleUpload('resume', $about);

         About::updateOrCreate(
            [
                'id'         => $id
            ],
            [
                'title'       => $request->title,
                'description' => $request->description,
                'image'       => (!empty($imagePath) ? $imagePath : $about->image),
                'resume'      => (!empty($resumePath) ? $resumePath : $about->resumePath), 
            ]
         );
    
         toastr()->success('Updated Successfully.', 'Congrats');
         return redirect()->back();
    }//End Method
     
}
