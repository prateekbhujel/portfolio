<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServiceDataTable;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ServiceDataTable $dataTable)
    {
        return $dataTable->render('admin.services.index');
        
    }//End Method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    
    }//End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Service::create($request->validate([
            'name' => 'required|max:100|min:5|unique:services,name',
            'description' => 'required|min:50|max:500',
        ]));

        toastr()->success('Services created Successfully!', 'congrats');

        return to_route('admin.services.index');

    }//End Method

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
         $service->update($request->validate([
            'name'          => ['required', Rule::unique('services', 'name')->whereNot('name', $service->name)],
            'description'   => ['required', Rule::unique('services', 'description')->whereNot('description', $service->description)],
         ]));

         toastr()->success('Services Edited Successfully', 'Congrats');
        return to_route('admin.services.index');
    }//End Method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {

        $service->delete();
        toastr()->success('Service Data Deleted Successfully', 'Info');

    }//End Method
}
