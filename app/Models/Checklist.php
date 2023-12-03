<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'checklist_group_id',
        'name'
    ];

    public function checklistGroup()
    {
        return $this->belongsTo(ChecklistGroup::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
