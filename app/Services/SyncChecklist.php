<?php

namespace App\Services;

use App\Models\Checklist;

class SyncChecklist
{
    public function sync(Checklist $checklist)
    {
        return $checklist->firstOrCreate(
            [
                'user_id' => auth()->user()->id,
                'checklist_id' => $checklist->id
            ],
            [
                'checklist_group_id'=> $checklist->checklist_group_id,
                'name' => $checklist->name
            ]
        );
    }
}
