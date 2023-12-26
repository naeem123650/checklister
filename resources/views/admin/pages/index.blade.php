@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary btn-sm" href="{{route('admin.pages.create')}}">Create Page</a>
            <hr>
            <div class="card mb-4">
                <div class="card-header">Pages</div>
                <div class="card-body">
                        <table class="table border mb-0">
                            <thead class="table-light fw-semibold">
                            <tr class="align-middle">
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($pages as $page)
                            <tr class="align-middle">
                                <td>
                                    <div>{{$page->name}}</div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg class="icon">
                                                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{route('admin.pages.edit',$page)}}">Edit</a>

                                            <form action="{{route('admin.pages.destroy',$page)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="dropdown-item text-danger" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr class="align-middle">
                                <td colspan="2" class="text-center"> No Pages found.</td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

@endsection
