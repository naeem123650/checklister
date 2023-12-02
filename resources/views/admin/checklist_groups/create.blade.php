@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.checklist_groups.store') }}" method="POST">
        @csrf
        <div class="card text-start">
            <div class="card-header">
                Create Checklist Group
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="checklist_group_name" class="form-label">Checklist Group Name</label>
                    <input type="text" class="form-control" name="name" id="checklist_group_name" placeholder="Enter Checklist Group Name">
                </div>
            </div>
            <div class="card-footer text-body-secondary">
                <button type="submit" href="#" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
