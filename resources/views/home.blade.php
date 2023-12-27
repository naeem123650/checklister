@extends('layouts.app')

@section('content')
<div class="container">
    @auth
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header"><strong>{{$page->name}}</strong></div>
                <div class="card-body">
                    <p class="text-medium-emphasis small">
                        {!! $page->content !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endauth
</div>
@endsection
