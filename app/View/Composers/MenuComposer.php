<?php

namespace App\View\Composers;

use App\Models\ChecklistGroup;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class MenuComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $menus =  ChecklistGroup::with([
            'checklists' => function($query) {
                $query->whereNull('user_id');
            }
        ])->get()->toArray();

        $groups = [];

        $lastActionAt = auth()->user()->last_action_at;

        if(is_null($lastActionAt)) {
            $lastActionAt = auth()->user()->update(
               ['last_action_at' => Carbon::now()->addYears(10)]
            );
        }

        foreach ($menus as $group) {
            $group['is_new'] = Carbon::create($group['created_at'])->greaterThan($lastActionAt);
            $group['is_updated'] = !($group['is_new']) && Carbon::create($group['updated_at'])->greaterThan($lastActionAt);;
            foreach ($group['checklists'] as &$checklist) {
                $checklist['is_new'] = Carbon::create($checklist['created_at'])->greaterThan($lastActionAt);
                $checklist['is_updated'] = !($checklist['is_new']) && Carbon::create($checklist['updated_at'])->greaterThan($lastActionAt);
                $checklist['tasks'] = 1;
                $checklist['completed_tasks'] = 0;
            }
            $groups[] = $group;
        }

        $view->with('user_menu', $groups);
    }
}
