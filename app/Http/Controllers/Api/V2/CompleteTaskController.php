<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class CompleteTaskController extends Controller
{
    public function __invoke(Request $request, Task $task)
    {
        $task->is_completed = $request->input('is_completed');
        $task->save();

        return TaskResource::make($task);
    }
}
