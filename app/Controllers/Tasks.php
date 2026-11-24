<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Entities\Task;
use CodeIgniter\HTTP\RedirectResponse;


class Tasks extends BaseController
{
    private TaskModel $tasks;

    public function __construct()
    {
        $this->tasks = model(TaskModel::class);
    }

    public function index(): string
    {
        return view('tasks/index', [
            'title' => 'My Tasks',
            'tasks' => $this->tasks->orderBy('created_at', 'DESC')->findAll(),
        ]);
    }

    public function show(int $id): string
    {
        $task = $this->findTaskOr404($id);

        return view('tasks/show', ['title' => $task->title, 'task' => $task]);
    }


    public function new(): string
    {
        return view('tasks/new', [
            'title' => 'New task',
            'task'  => new Task(),
        ]);
    }

    public function create(): RedirectResponse
    {
        $data = $this->taskInput();

        if (! $this->validateData($data, 'task')) {
            return redirect()->back()->withInput();
        }

        $this->tasks->insert($data);

        return redirect()->route('tasks.index')->with('message', 'Task added.');
    }

    /**
     * Only the fields a user may set. A blank date is stored as NULL.
     */
    private function taskInput(): array
    {
        $data = $this->request->getPost(
            ['title', 'description', 'status', 'due_date'],
        );
        $data['due_date'] = $data['due_date'] ?: null;

        return $data;
    }

    public function edit(int $id): string
    {
        return view('tasks/edit', [
            'title' => 'Edit task',
            'task'  => $this->findTaskOr404($id),
        ]);
    }

    public function update(int $id): RedirectResponse
    {
        $this->findTaskOr404($id);
        $data = $this->taskInput();

        if (! $this->validateData($data, 'task')) {
            return redirect()->back()->withInput();
        }

        $this->tasks->update($id, $data);

        return redirect()->route('tasks.show', [$id])
            ->with('message', 'Task saved.');
    }

    public function delete(int $id): RedirectResponse
    {
        $this->findTaskOr404($id);
        $this->tasks->delete($id);

        return redirect()->route('tasks.index')->with('message', 'Task deleted.');
    }

    private function findTaskOr404(int $id): Task
    {
        $task = $this->tasks->find($id);

        if ($task === null) {
            throw PageNotFoundException::forPageNotFound('Task not found.');
        }

        return $task;
    }
}
