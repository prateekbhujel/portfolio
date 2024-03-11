<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProtfolioItemDataTable;
use App\Http\Controllers\Controller;
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
        return view('admin.protfolio.item.create');
    
    }//End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    
    }//End Method

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProtfolioItem $item)
    {
        

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProtfolioItem $item)
    {
        //

    }//End Method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProtfolioItem $item)
    {
        $item->delete();

        toastr()->info('Data Deleted Successfully', 'Info');

    }//End Method
}
