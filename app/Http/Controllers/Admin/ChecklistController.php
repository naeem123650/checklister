<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateChecklistRequest;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklists.create',compact('checklistGroup'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateChecklistRequest $request,ChecklistGroup $checklistGroup)
    {
        $checklistGroup->checklists()->create($request->validated());

        return to_route('admin.home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChecklistGroup $checklistGroup,Checklist $checklist)
    {
        return view('admin.checklists.edit',compact('checklistGroup','checklist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateChecklistRequest $request,ChecklistGroup $checklistGroup)
    {
        $checklistGroup->checklists()->update($request->validated());

        return to_route('admin.home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChecklistGroup $checklistGroup,Checklist $checklist)
    {
        $checklistGroup->checklists()->delete();

        return to_route('admin.home');
    }
}
