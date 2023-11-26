@extends('layouts.app')

@section('content')
<div class="container">
    @auth
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header"><strong>Dashboard</strong></div>
                <div class="card-body">
                    <p class="text-medium-emphasis small">you are logged in ! {{ auth()->user()->name }} </p>
                </div>
            </div>
        </div>
    </div>
    @endauth
</div>
@endsection
