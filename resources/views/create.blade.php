@extends('layouts')
@section('content')
<div>
	<a href="{{ route('tasks.index') }}" class="mt-2 text-sm text-gray-700 dark:text-gray-400 hover:underline">Go to tasks list</a>
	<h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Create Task</h2>
	<div class="mt-6 flex-none min-w-full px-4 sm:px-6 md:px-0 overflow-hidden lg:overflow-auto scrollbar:!w-1.5 scrollbar:!h-1.5 scrollbar:bg-transparent scrollbar-track:!bg-slate-100 scrollbar-thumb:!rounded scrollbar-thumb:!bg-slate-300 scrollbar-track:!rounded dark:scrollbar-track:!bg-slate-500/[0.16] dark:scrollbar-thumb:!bg-slate-500/50">
		<form action="{{ route('tasks.store') }}" method="POST">
			@csrf
			<label class="text-sm leading-6 mt-3 font-semibold text-slate-700 p-0 dark:text-slate-300">Name</label>
			<div class="mb-3">
				<input name="name" class="py-2 w-96 border-b border-slate-200 dark:border-slate-400/20 dark:bg-transparent focus:outline-none dark:text-white" type="text" required>
			</div>
			<label class="text-sm leading-6 mt-3 font-semibold text-slate-700 p-0 dark:text-slate-300">Priority</label>
			<div class="mb-3">
				<input name="priority" class="py-2 pr-30 border-b border-slate-200 dark:border-slate-400/20 dark:bg-transparent focus:outline-none dark:text-white" type="number" required>
			</div>
			<label class="text-sm leading-6 mt-3 font-semibold text-slate-700 p-0 dark:text-slate-300">Label</label>
			<div class="mt-3">
				<select name="project" class="text-sm py-2 w-96 border-b border-slate-200 dark:border-slate-400/20 dark:bg-transparent focus:outline-none dark:text-white" type="number" required>
					<option value="">Select Project</option>
					<option value="Project 1">Project 1</option>
					<option value="Project 2">Project 2</option>
					<option value="Project 3">Project 3</option>
				</select>
			</div>
			<div>
				<button type="submit" class="p-2 mt-10 border rounded border-slate-200 dark:border-slate-400/20 dark:border-slate-400/20 hover:opacity-80 focus:outline-none dark:text-white">Create</button>
			</div>
		</form>
	</div>
</div>
@endsection