@extends('layouts')
@section('content')
<div>
	<div class="flex justify-between">
		<div>
			<h2 class=" mt-6 text-xl font-semibold text-gray-900 dark:text-white">Tasks</h2>
			<a href="{{ route('tasks.create') }}" class="mt-2 text-sm text-gray-700 dark:text-gray-400 hover:underline">Add new +</a>
		</div>
		<div>
			<select id="select-project" class="form-select w-full max-w-xs dark:text-slate-300 dark:bg-transparent">
				<option value="all">All Projects</option>
				@foreach ($projects as $project)
				<option value="{{ $project }}">{{ $project }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="mt-6 flex-none min-w-full px-4 sm:px-6 md:px-0 overflow-hidden lg:overflow-auto scrollbar:!w-1.5 scrollbar:!h-1.5 scrollbar:bg-transparent scrollbar-track:!bg-slate-100 scrollbar-thumb:!rounded scrollbar-thumb:!bg-slate-300 scrollbar-track:!rounded dark:scrollbar-track:!bg-slate-500/[0.16] dark:scrollbar-thumb:!bg-slate-500/50">
		<table class="w-full text-left border-collapse">
			<thead>
				<tr>
					<th class="sticky z-10 w-36 top-0 text-sm leading-6 font-semibold text-slate-700 p-0 dark:text-slate-300">
						<div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Name</div>
					</th>
					<th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 p-0 dark:text-slate-300">
						<div class="py-2 border-b border-slate-200 dark:border-slate-400/20">Priority</div>
					</th>
					<th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 p-0 dark:text-slate-300">
						<div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Project</div>
					</th>
					<th class="sticky z-10 w-36 top-0 text-sm leading-6 font-semibold text-slate-700 p-0 dark:text-slate-300">
						<div class="py-2 pl-2 pr-6 border-b border-slate-200 dark:border-slate-400/20">Timestamp</div>
					</th>
					<th colspan="2" class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 p-0 dark:text-slate-300">
						<div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Action</div>
					</th>
				</tr>
			</thead>
			@if (!count($tasks))
			<tr>
				<td colspan="3" class="py-10 px-10 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 text-center">No tasks created yet</td>
			</tr>
			@endif
		</table>
		<livewire:task-sortable />
		<div class=" sticky bottom-0 h-px -mt-px bg-slate-200 dark:bg-slate-400/20">
		</div>
	</div>
</div>
@endsection