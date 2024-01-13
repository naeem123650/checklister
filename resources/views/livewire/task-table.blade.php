<table class="table">
    <tbody>
    @forelse($tasks as $task)
        <tr>
            <th scope="row">
                @if(!$loop->first)
                    <a wire:click.prevent="moveTaskUp({{$task->id}})" title="Up" style="cursor: pointer;">
                        &uarr;
                    </a>
                @endif
                &nbsp;&nbsp;
                @if(!$loop->last)
                    <a wire:click.prevent="moveTaskDown({{$task->id}})" title="Down" style="cursor: pointer;">
                        &darr;
                    </a>
                @endif
            </th>
            <th scope="row">{{$task->id}}</th>
            <td>{{$task->name}}</td>
            <td>
                <a href="{{route('admin.checklists.tasks.edit',[$checklist,$task])}}" class="btn btn-sm btn-warning">Edit</a>
                <form style="display:inline" action="{{route('admin.checklists.tasks.destroy',[$checklist,$task])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete This Task</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">No tasks found</td>
        </tr>
    @endforelse
    </tbody>
</table>
