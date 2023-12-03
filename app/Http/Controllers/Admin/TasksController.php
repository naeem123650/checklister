<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request,Checklist $checklist)
    {
        $checklistGroup = $checklist->checklistGroup;

        $checklist->tasks()->create(
            $request->validated() + ['position' => $this->getTaskPosition($checklist)]
        );

        return redirect()->back();
    }

    public function getTaskPosition(Checklist $checklist)
    {
        return $checklist->tasks->max('position') + 1;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checklist $checklist,Task $task)
    {
        return view('admin.tasks.edit',compact('checklist','task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $request,Checklist $checklist,Task $task)
    {
        $checklistGroup = $checklist->checklistGroup;
        $task->update($request->validated());
        return view('admin.checklists.edit',compact('checklistGroup','checklist'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checklist $checklist,Task $task)
    {
        $task->delete();
        $checklistGroup = $checklist->checklistGroup;
        return view('admin.checklists.edit',compact('checklistGroup','checklist'));
    }
}
