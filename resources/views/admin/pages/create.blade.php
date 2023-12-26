@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.pages.store') }}" method="POST">
        @csrf
        <div class="card text-start">
            <div class="card-header">
                Create Page
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="checklist_name" class="form-label">Page Name</label>
                    <input type="text" class="form-control" name="name" id="checklist_name" placeholder="Enter Page Name" value="{{old('name')}}">
                </div>
                <div class="mb-3">
                    <label for="task_description" class="form-label">Page Description</label>
                    <textarea rows="4"  class="form-control" name="content" id="page_content" placeholder="Page Content">{{old('description')}}</textarea>
                </div>
            </div>
            <div class="card-footer text-body-secondary">
                <button type="submit" href="#" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#page_content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
