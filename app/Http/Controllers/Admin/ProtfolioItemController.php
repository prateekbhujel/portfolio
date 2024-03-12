<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProtfolioItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProtfolioItem;
use Illuminate\Http\Request;

class ProtfolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProtfolioItemDataTable $dataTable)
    {
        return $dataTable->render('admin.protfolio.item.index');

    }//End Method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.protfolio.item.create', compact('categories'));
    
    }//End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
                        'image'       => 'required|image|max:5500',
                        'title'       => 'required|max:200',
                        'description' => 'required',
                        'category_id' => 'required|numeric',
                        'client'      => 'max:300',
                        'website'     => 'url|nullable',
                        'created_at'  => 'required|date',
                    ]);
        
        $validated['image'] =  handleUpload('image');
        
        ProtfolioItem::create($validated);
        
        toastr()->success('Item Created Successfully.', 'Success');
        return to_route('admin.protfolio-item.index');

    }//End Method

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProtfolioItem $protfolio_item)
    {
        $categories = Category::all();

       return view('admin.protfolio.item.edit', compact('protfolio_item', 'categories'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProtfolioItem $protfolio_item)
    {
        $validated = $request->validate([
            'image'       => 'image|max:5500',
            'title'       => 'required|max:200',
            'description' => 'required',
            'category_id' => 'required|numeric',
            'client'      => 'max:300',
            'website'      => 'url|nullable',
            'created_at'  => 'required|date',
        ]);

        $validated['image'] =  (!empty(handleUpload('image', $protfolio_item))) ? handleUpload('image', $protfolio_item) : $protfolio_item->image;

        $protfolio_item->update($validated);

        toastr()->success('Item Updated Successfully.', 'Success');
        return to_route('admin.protfolio-item.index');

    }//End Method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProtfolioItem $protfolio_item)
    {
        $protfolio_item->delete();
        deleteFileIfExist($protfolio_item->image);

    }//End Method
}
