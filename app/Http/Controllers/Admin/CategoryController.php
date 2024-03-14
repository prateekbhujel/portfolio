<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProtfolioItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {

        return $dataTable->render('admin.protfolio.category.index');

    }//End Method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.protfolio.category.create');

    }//End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required|min:2|max:30|unique:categories,name',
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
        return view('admin.protfolio.category.edit', compact('category'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required','min:2','max:30', Rule::unique('categories','name')->whereNot('name', $category->name)],
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'updated_at'=> Carbon::now(),
        ]);

        toastr()->success('Category Updated Successfully');
        return to_route('admin.category.index');

    }//End Method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $hasItem = ProtfolioItem::where('category_id', $category->id)->count();
        if($hasItem == 0){
            $category->delete();
            return true;
        }

        return response(['status' => 'error']);
        
    }//End Method   
}
