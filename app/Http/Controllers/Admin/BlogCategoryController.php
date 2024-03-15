<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.category.index');

    }//End Method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.category.create');

    }//End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required|min:2|max:30|unique:blog_categories,name',
       ]);

       BlogCategory::create([
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        ]);

        toastr()->success('Blog Category Created Successfully.');
        return to_route('admin.blog-category.index');

    }//End Method

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blog_category)
    {
        
        return view('admin.blog.category.edit', compact('blog_category'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blog_category)
    {
        $request->validate([
            'name' => ['required', 'min:2', 'max:30', Rule::unique('blog_categories', 'name')->whereNot('name', $blog_category->name)],
        ]);

        $blog_category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'updated_at'=> Carbon::now(),
        ]);

        toastr()->success('Blog Category Updated Successfully');
        return to_route('admin.blog-category.index');

    }//End Method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blog_category)
    {
       
        $hasItem = Blog::where('category', $blog_category->id)->count();
        if($hasItem == 0){
            $blog_category->delete();
            return true;
        }

        return response(['status' => 'error']);

    }//End Method
}
