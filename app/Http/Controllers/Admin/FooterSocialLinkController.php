<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterSocialLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterSocialLink;
use Illuminate\Http\Request;

class FooterSocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterSocialLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.footer.social-link.index');

    }//End Method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.social-link.create');

    }//End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        FooterSocialLink::create($request->validate([
            'icon' => 'required',
            'url' => 'required|url'
        ]));

        toastr('Social Link created Successfully.','success');
        return to_route('admin.footer-social.index');

    }//End Method

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FooterSocialLink $footer_social)
    {
        return view('admin.footer.social-link.edit', compact('footer_social'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FooterSocialLink $footer_social)
    {
        $footer_social->update($request->validate([
            'icon' => 'required',
            'url' => 'required|url'
        ]));

        toastr('Social Link Updated.', 'success');
        return to_route('admin.footer-social.index');

    }//End Method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FooterSocialLink $footer_social)
    {
        $footer_social->delete();
        return true;

    }//End Method
}
