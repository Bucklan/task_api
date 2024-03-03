<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $tasks = Task::status(request('status'))
            ->search(request('search'))
            ->deadline(request('deadline'))
            ->orderBy('deadline_at', 'asc')
            ->paginate(10);
        return TaskResource::collection($tasks);
    }


    public function store(TaskRequest $request): TaskResource
    {

        $task = Task::create($request->validated());

        return new TaskResource($task);
    }

    public function show($id): TaskResource
    {
        return new TaskResource(Task::findOrFail($id));
    }

    public function update(TaskRequest $request, Task $task): TaskResource
    {
        $task->update($request->validated());

        return new TaskResource($task);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        Task::destroy($id);
        return response()->json(['message' => 'Task successfully deleted!']);
    }
}
