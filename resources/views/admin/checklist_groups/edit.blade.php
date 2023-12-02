@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.checklist_groups.update',[$checklistGroup]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card text-start">
            <div class="card-header">
                Update Checklist Group
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="checklist_group_name" class="form-label">Checklist Group Name</label>
                    <input type="text" value="{{$checklistGroup->name}}" class="form-control" name="name" id="checklist_group_name" placeholder="Enter Checklist Group Name">
                </div>
            </div>
            <div class="card-footer text-body-secondary">
                <button type="submit" href="#" class="btn btn-primary">Update</button>

            </div>
        </div>
    </form>
    <form action="{{route('admin.checklist_groups.destroy',[$checklistGroup])}}">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure ?');" class="btn btn-danger">Delete</button>
    </form>
@endsection
