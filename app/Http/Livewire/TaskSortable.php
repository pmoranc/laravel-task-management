<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskSortable extends Component
{
    public $selectedProject = ''; // Default selected project

    public function render()
    {
        $query = Task::orderBy('priority');

        // var_dump($this->selectedProject);
        if ($this->selectedProject && $this->selectedProject !== 'all') {
            $query->where('project', $this->selectedProject);
        }

        $tasks = $query->get();
        $projects = Task::distinct('project')->pluck('project')->sortBy('project');

        return view('livewire.task-sortable', compact('tasks', 'projects'));
    }

    public function updateTaskOrder($list)
    {
        foreach ($list as $item) {
            Task::find($item['value'])->update([
                'priority' => $item['order']
            ]);
        }
    }

    public function refresh($project)
    {
        $this->selectedProject = $project;
        var_dump($project);
        // Empty method to trigger component update
    }
}
