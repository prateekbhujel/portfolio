<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterInfo;
use Illuminate\Http\Request;

class FooterInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footer_info = FooterInfo::first();

        return view('admin.footer.info.index', compact('footer_info'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        FooterInfo::updateOrCreate(
            [
                'id' => $id
            ],
            $request->validate([
                'info'      => 'nullable|max:200|min:10',
                'copy_right'=> 'nullable|max:50|min:10',
                'powered_by'=> 'nullable|max:100|min:10',
            ])
        );

        toastr('Footer Information Updated', 'success');
        return redirect()->back();

    }//End Method
}
