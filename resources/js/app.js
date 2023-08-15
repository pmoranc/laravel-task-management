import './bootstrap';

const projectSelect = document.getElementById('select-project');
const taskListContainer = document.getElementById('task-list');

projectSelect.addEventListener('change', function () {
  const selectedProject = projectSelect.value;

  // Loop through each task item and show/hide based on selected project
  const taskItems = taskListContainer.querySelectorAll('li');
  taskItems.forEach(taskItem => {
    const projectText = taskItem.querySelector('.project-item').textContent;
    taskItem.style.display = selectedProject === 'all' || projectText === selectedProject ? 'flex' : 'none';
  });
});
