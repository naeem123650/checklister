@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.checklist_groups.checklists.store',$checklistGroup) }}" method="POST">
        @csrf
        <div class="card text-start">
            <div class="card-header">
                Create Checklist
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="checklist_name" class="form-label">Checklist Name</label>
                    <input type="text" class="form-control" name="name" id="checklist_name" placeholder="Enter Checklist Name">
                </div>
            </div>
            <div class="card-footer text-body-secondary">
                <button type="submit" href="#" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
