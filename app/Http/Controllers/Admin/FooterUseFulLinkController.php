<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterUseFulLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterUseFulLink;
use Illuminate\Http\Request;

class FooterUseFulLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterUseFulLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.footer.useful-links.index');

    }//End Method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.useful-links.create');

    }//End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        FooterUseFulLink::create(
            $request->validate([
              'name' => 'required|max:100',  
              'url' => 'required',  
            ])
        );

        toastr('Successfully Created.' ,'success');
        return to_route('admin.footer-useful-links.index');

    }//End Method

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FooterUseFulLink $footer_useful_link)
    {

        return view('admin.footer.useful-links.edit', compact('footer_useful_link'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FooterUseFulLink $footer_useful_link)
    {
        $footer_useful_link->update(
            $request->validate([
              'name' => 'required|max:100',  
              'url' => 'required',  
            ])
        );

        toastr('Successfully Created.' ,'success');
        return to_route('admin.footer-useful-links.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FooterUseFulLink $footer_useful_link)
    {
        $footer_useful_link->delete();
        return true;

    }//End Method
}
