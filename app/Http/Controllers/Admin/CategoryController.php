<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {

        return $dataTable->render('admin.protfolio-category.index');

    }//End Method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.protfolio-category.create');

    }//End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required|min:2|max:30',
       ]);
       Category::create([
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        ]);

        toastr()->success('Category Created Successfully.');
        return to_route('admin.category.index');

    }//End Method

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.protfolio-category.edit', compact('category'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:20|min:2',
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        toastr()->success('Category Updated Successfully');
        return to_route('admin.category.index');

    }//End Method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        toastr()->info('Caegory Data Deleted Successfully', 'Info');
        
    }//End Method   
}
