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
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
    <form action="{{route('admin.checklist_groups.checklists.destroy',[$checklistGroup, $checklist])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
