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

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        class MyUploadAdapter {
            constructor( loader ) {
                this.loader = loader;
            }

            upload() {
                return this.loader.file
                    .then( file => new Promise( ( resolve, reject ) => {
                        this._initRequest();
                        this._initListeners( resolve, reject, file );
                        this._sendRequest( file );
                    } ) );
            }

            abort() {
                if ( this.xhr ) {
                    this.xhr.abort();
                }
            }

            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();
                xhr.open( 'POST', '{{route('admin.image.upload')}}', true );
                xhr.setRequestHeader('x-csrf-token','{{ csrf_token() }}');
                xhr.responseType = 'json';
            }

            _initListeners( resolve, reject, file ) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                xhr.addEventListener( 'abort', () => reject() );
                xhr.addEventListener( 'load', () => {
                    const response = xhr.response;

                    if ( !response || response.error ) {
                        return reject( response && response.error ? response.error.message : genericErrorText );
                    }

                    resolve( {
                        default: response.url
                    } );
                } );

                if ( xhr.upload ) {
                    xhr.upload.addEventListener( 'progress', evt => {
                        if ( evt.lengthComputable ) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    } );
                }
            }

            _sendRequest( file ) {
                const data = new FormData();
                data.append( 'upload', file );
                this.xhr.send( data );
            }
        }

        function MyCustomUploadAdapterPlugin( editor ) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                return new MyUploadAdapter( loader );
            };
        }

        ClassicEditor
            .create( document.querySelector( '#task_description' ), {
                extraPlugins: [ MyCustomUploadAdapterPlugin ],
            })
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
