@extends('layouts.app')

@section('content')
        <div class="card text-start">
            <div class="card-header">
                Users Details
            </div>
            <div class="card-body">
                <table class="table" wire:sortable="updateTaskOrder">
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <th scope="row">{{$user->created_at}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->website}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No users found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$users->links()}}
            </div>
        </div>
@endsection

