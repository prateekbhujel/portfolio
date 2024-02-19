<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TyperTitleDataTable;
use App\Http\Controllers\Controller;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class TyperTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TyperTitleDataTable $datatable)
    {
        return $datatable->render('admin.typer-title.index');

    }//End Method
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.typer-title.create');
        
    }//End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'title' => 'required|max:200|min:10'
       ]);
       $typer_title = new TyperTitle();
       $typer_title->title = $request->title;
       $typer_title->save();
        
       toastr()->success('Typer Title Created Successfully', 'Congrats');
       return to_route('admin.typer-title.index');

    }//End Method

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
