<?php

namespace App\View\Composers;

use App\Models\Checklist;
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
            },
            'checklists.tasks'
        ])->get();

        $view->with('admin_menu', $menus);

        $groups = [];

        $user_checklists = Checklist::where('user_id',auth()->id())->get();

        foreach ($menus->toArray() as $group) {
            if (count($group['checklists']) > 0) {
                $group_updated_at = $user_checklists->where('checklist_group_id', $group['id'])->max('updated_at');
                $group['is_new'] = $group_updated_at && Carbon::create($group['created_at'])->greaterThan($group_updated_at);
                $group['is_updated'] = !($group['is_new'])
                    && $group_updated_at
                    && Carbon::create($group['updated_at'])->greaterThan($group_updated_at);

                foreach ($group['checklists'] as &$checklist) {
                    $checklist_updated_at = $user_checklists->where('checklist_id', $checklist['id'])->max('updated_at');

                    $checklist['is_new'] = !($group['is_new'])
                        && $checklist_updated_at
                        && Carbon::create($checklist['created_at'])->greaterThan($checklist_updated_at);
                    $checklist['is_updated'] = !($group['is_new']) && !($group['is_updated'])
                        && !($checklist['is_new'])
                        && $checklist_updated_at
                        && Carbon::create($checklist['updated_at'])->greaterThan($checklist_updated_at);;
                    $checklist['tasks_count'] = count($checklist['tasks']);
//                    $checklist['completed_tasks_count'] = count($checklist['user_completed_tasks']);
                }

                $groups[] = $group;
            }
        }
        $view->with('user_menu', $groups);
    }
}
