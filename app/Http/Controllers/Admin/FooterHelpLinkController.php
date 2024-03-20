<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterHelpLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterHelpLink;
use Illuminate\Http\Request;

class FooterHelpLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterHelpLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.footer.help-links.index');

    }//End method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.help-links.create');
    }//End method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        FooterHelpLink::create($request->validate([
            'name' => 'required|min:2|max:36',
            'url' => 'required',
        ]));

        toastr('Created Successfully','success');
        return to_route('admin.footer-help-links.index');

    }//End method

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FooterHelpLink $footer_help_link)
    {
        return view('admin.footer.help-links.edit', compact('footer_help_link'));
    }//End method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FooterHelpLink $footer_help_link)
    {
        $footer_help_link->update($request->validate([
            'name' => 'required|min:2|max:36',
            'url' => 'required',
        ]));

        toastr('Successfully Updated', 'success');
        return to_route('admin.footer-help-links.index');

    }//End method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FooterHelpLink $footer_help_link)
    {
        $footer_help_link->delete();
        return true;

    }//End method
} 
