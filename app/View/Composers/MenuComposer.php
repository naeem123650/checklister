<?php

namespace App\View\Composers;

use App\Models\ChecklistGroup;
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

        foreach ($menus as $group) {
            $group['is_new'] = false;
            $group['is_updated'] = false;
            foreach ($group['checklists'] as &$checklist) {
                $checklist['is_new'] = false;
                $checklist['is_updated'] = false;
                $checklist['tasks'] = 1;
                $checklist['completed_tasks'] = 0;
            }
            $groups[] = $group;
        }

        $view->with('user_menu', $groups);
    }
}
