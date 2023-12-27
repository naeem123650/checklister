<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Services\SyncChecklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function __construct(protected SyncChecklist $syncChecklist)
    {}
    public function __invoke(Checklist $checklist)
    {
        $this->syncChecklist->sync($checklist);

        return view('user.checklist.index',compact('checklist'));
    }
}
