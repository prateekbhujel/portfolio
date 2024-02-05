<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
// use Illuminate\Validation\Rule;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::first();

        return view('admin.hero.index', compact('hero'));

    }//End Method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }//End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /** 
     * Either Create or Update.
    **/
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'     => 'required|max:200',
            'sub_title' => 'required|max:500',
            'image'     => 'max:3000|image',
        ]);
    
        $hero = Hero::first();
        $imagePath = $hero ? $hero->image : null;

        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            
            // Check image quality before proceeding
            if ($image->getSize() <= 40 * 1024) {
                toastr()->error('Image quality is too low.', 'Error');
                return redirect()->back();
            }
                
            // Check if the file exists
            if ($hero && $hero->image) {
                // Delete the old file
                unlink(public_path($hero->image));
            }

            //Modifiying The Image
            $Imgmanager = new Image(new Driver);
            $img = $Imgmanager->read($image->getRealPath());
            $img->resize(1850, 850);
    
            // Save the modified image
            $imageName = rand() . $image->getClientOriginalName();
            $img->save(public_path('/uploads/' . $imageName));
    
            $imagePath = '/uploads/' . $imageName;
        }
    
        Hero::updateOrCreate(
            ['id'        => $id],
            [
                'title'     => $request->title,
                'sub_title' => $request->sub_title,
                'btn_text'  => $request->btn_text,
                'btn_url'   => $request->btn_url,
                'image'     => $imagePath,
            ]
        );
    
        toastr()->success('Updated Successfully.', 'Congrats');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
