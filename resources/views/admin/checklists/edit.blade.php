@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.checklist_groups.checklists.update',[$checklistGroup,$checklist]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card text-start">
            <div class="card-header">
                Update Checklist
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="checklist_name" class="form-label">Checklist Name</label>
                    <input type="text" value="{{$checklist->name}}" class="form-control" name="name" id="checklist_name" placeholder="Enter Checklist Name">
                </div>
            </div>
            <div class="card-footer text-body-secondary">
                <button type="submit" class="btn btn-sm btn-primary">Update</button>
            </div>
        </div>
    </form>
    <br>

    <form action="{{route('admin.checklist_groups.checklists.destroy',[$checklistGroup, $checklist])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">Delete This Checklist</button>
    </form>
    <hr>
    <h4>
        Task Lists
    </h4>

    {{-- livewire task table component  --}}
    @livewire('task-table', ['checklist' => $checklist])

    <hr>
    <form action="{{ route('admin.checklists.tasks.store',[$checklist]) }}" method="POST">
        @csrf
        <div class="card text-start">
            <div class="card-header">
                Create Task
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="task_name" class="form-label">Task Name</label>
                    <input type="text" value="{{old('name')}}" class="form-control" name="name" id="task_name" placeholder="Task Name">
                </div>
                <div class="mb-3">
                    <label for="task_description" class="form-label">Task Description</label>
                    <textarea rows="4"  class="form-control" name="description" id="task_description" placeholder="Task Description">{{old('description')}}</textarea>
                </div>
            </div>
            <div class="card-footer text-body-secondary">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
