<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterContactInfo;
use Illuminate\Http\Request;

class FooterContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact_info = FooterContactInfo::first();
        
        return view('admin.footer.contact-info.index', compact('contact_info'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        FooterContactInfo::updateOrCreate(
            ['id' => $id],
            $request->validate([
                'address' => 'max:500|nullable',
                'phone'   => 'nullable|max:35',
                'email'   => 'nullable|email|max:200' 
            ])
        );

        toastr('Contact Info Updated', 'success');
        return redirect()->back();

    }//End Method
}
