@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.checklists.tasks.update',[$checklist,$task]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card text-start">
            <div class="card-header">
                Update Task
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="task_name" class="form-label">Task Name</label>
                    <input type="text" value="{{$task->name}}" class="form-control" name="name" id="task_name" placeholder="Task Name">
                </div>
                <div class="mb-3">
                    <label for="task_description" class="form-label">Task Description</label>
                    <textarea rows="4"  class="form-control" name="description" id="task_description" placeholder="Task Description">{{$task->description}}</textarea>
                </div>
            </div>
            <div class="card-footer text-body-secondary">
                <button type="submit" class="btn btn-sm btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection
