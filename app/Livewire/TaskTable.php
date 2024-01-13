<?php

namespace App\Livewire;

use App\Models\Checklist;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TaskTable extends Component
{
    public  $checklist;

    public function render()
    {
        $tasks = $this->checklist->tasks()->orderBy('position')->get();

        return view('livewire.task-table',compact('tasks'));
    }

    public function moveTaskUp($taskId)
    {
        $currentTask = Task::find($taskId);
        if($currentTask) {
            $upTask = Task::where('position', $currentTask->position - 1)->update(
                ['position' => $currentTask->position]
            );

            $currentTask->update(['position' => $currentTask->position - 1]);
        }
    }

    public function moveTaskDown($taskId)
    {
        $currentTask = Task::find($taskId);

        if($currentTask) {
            $downTask = Task::where('position',$currentTask->position + 1)->update([
                'position' =>  $currentTask->position
            ]);

            $currentTask->update([
                'position' => $currentTask->position + 1
            ]);
        }
    }
}
