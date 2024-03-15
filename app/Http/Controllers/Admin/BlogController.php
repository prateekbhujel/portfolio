<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');

    }//End Method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));

    }//End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'       => ['required', 'max:5000', 'image'],
            'title'       => ['required', 'max:300'],
            'description' => ['required'],
            'category'    => ['required', 'numeric'],
        ]);

        $blog = new Blog();
        $imagePath = handleUpload('image');

        $blog->image       = $imagePath;
        $blog->title       = $request->title;
        $blog->description = $request->description;
        $blog->category    = $request->category;
        $blog->save();

        toastr('Blog Created Successfully.', 'success');
        return to_route('admin.blog.index');

    }//End Method

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();

        return view('admin.blog.edit', compact('blog','categories'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
         $request->validate([
            'image'       => ['max:5000', 'image'],
            'title'       => ['required', 'max:300'],
            'description' => ['required'],
            'category'    => ['required', 'numeric'],
        ]);

        $imagePath = handleUpload('image', $blog);
        $blog->image       = (!empty($imagePath) ? $imagePath : $blog->image);
        $blog->title       = $request->title;
        $blog->description = $request->description;
        $blog->category    = $request->category;
        $blog->save();

        toastr('Blog Updated Successfully.', 'success');
        return redirect()->back();

    }//End Method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        deleteFileIfExist($blog->image);
        return true;

    }//End Method
}
