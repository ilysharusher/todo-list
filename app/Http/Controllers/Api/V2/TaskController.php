<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Auth\Access\AuthorizationException;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class);
    }

    public function index()
    {
        return TaskResource::collection(auth()->user()->tasks()->get());
    }

    public function store(StoreTaskRequest $request)
    {
        return TaskResource::make(auth()->user()->tasks()->create($request->validated()));
    }

    /**
     * @throws AuthorizationException
     */
    public function show(Task $task)
    {
        $this->authorize('view', $task);
        return TaskResource::make($task);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        return TaskResource::make(tap($task)->update($request->validated()));
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->noContent();
    }
}
