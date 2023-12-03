<table class="table" wire:sortable="updateTaskOrder">
    <tbody>
    @forelse($tasks as $task)
        <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
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
