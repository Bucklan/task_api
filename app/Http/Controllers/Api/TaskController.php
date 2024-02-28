<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{

    public function search(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
//        dd(request('deadline'));
        $tasks = Task::query();

        if (request()->has('status') || request('deadline')) {
            $tasks->where('status', request('status'))
                ->orWhere('deadline_at','<=', request('deadline'));
        }

        return TaskResource::collection($tasks->get());
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return TaskResource::collection(Task::get());
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
