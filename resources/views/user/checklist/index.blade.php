@extends('layouts.app')

@section('content')
    <div class="card text-start">
        <div class="card-header">
          {{$checklist->name}}
        </div>
            <div class="card-body">
                @forelse($checklist->tasks as $task)
                <div class="card card-body pt-2 pb-2">
                    <a data-coreui-toggle="collapse" href="#multiCollapseExample-{{$task->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample-{{$task->id}}">
                        {{$task->name}}
                    </a>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapseExample-{{$task->id}}">
                                <div class="card card-body">
                                    {!! $task->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="card-body">
                        <div class="card card-body">
                            No Task Available
                        </div>
                    </div>
                @endforelse
            </div>
    </div>
@endsection

