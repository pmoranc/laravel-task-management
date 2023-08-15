<ul id="task-list" class=" align-baseline" wire:sortable="updateTaskOrder" wire:sortable.options="{ animation: 100 }">
    @foreach ($tasks as $task)
    <li class="flex justify-between items-center cursor-move" wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
        <div class="py-2 w-36 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">{{ $task->name }}</div>
        <div class="py-2 w-16 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">{{ $task->priority }}</div>
        <div class="py-2 pl-4 w-20 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 project-item">{{ $task->project }}</div>
        <div class="py-2 w-36 pl-4 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">{{ $task->created_at }}</div>
        <div class="py-2 pl-12 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300"><a href="{{ route('tasks.edit', $task->id) }}">Edit</a></div>
        <div class="">
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300" submit">Delete</button>
            </form>
        </div>
    </li>
    @endforeach
</ul>