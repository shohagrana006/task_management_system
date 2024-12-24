<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TaskResource;
use App\Models\Admin\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends BaseController
{
    public function index(): JsonResponse
    {
        $tasks = Task::with('user')->get();
       
        if($tasks->isEmpty()){
            return self::errorWithResponse("No Tasks found", 404);
        }

        return self::successWithResponse("Tasks retrieved successfully", 200, TaskResource::collection($tasks));
    }
}
