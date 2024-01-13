<?php

namespace App\Livewire;

use App\Models\Checklist;
use App\Models\Task;
use Livewire\Component;

class TaskTable extends Component
{
    public  $checklist;

    public function render()
    {
        $tasks = $this->checklist->tasks()->orderBy('position')->get();

        return view('livewire.task-table',compact('tasks'));
    }
}
