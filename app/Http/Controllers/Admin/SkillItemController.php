<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SkillItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\SkillItem;
use Illuminate\Http\Request;

class SkillItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SkillItemDataTable $dataTable)
    {
        return $dataTable->render('admin.skill-section.item.index');

    }//End Method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill-section.item.create');
        
    }//End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SkillItem::create($request->validate([
            'name'       => 'required|max:20',
            'percentage' => 'required|numeric|max:100'
        ]));

        toastr('Skill Item Created Successfully.', 'success');
        return to_route('admin.skill-section-item.index');
    }//End Method


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SkillItem $skill_section_item)
    {
        
        return view('admin.skill-section.item.edit', compact('skill_section_item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SkillItem $skill_section_item)
    {
        $skill_section_item->update($request->validate([
                'name'       => 'required|max:20',
                'percentage' => 'required|numeric|max:100',
        ]));

        toastr('Skill Item Updated.','success');
        return to_route('admin.skill-section-item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SkillItem $skill_section_item)
    {
        
        $skill_section_item->delete();
        return true;
        return redirect()->back();
    }
}
