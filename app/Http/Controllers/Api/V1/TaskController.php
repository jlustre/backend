<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('priority')->get();
        if($tasks->count() > 0){
            return TaskResource::collection($tasks);
        } else {
            return response()->json(['message' => 'No tasks found'], 201);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        $task->load(['priority']);
        
        return response()->json([
            'message' => 'Task created successfully', 
            'data' => new TaskResource($task)
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $task->load(['priority']);
        return new TaskResource($task);
        
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        $task->load(['priority']);
        return response()->json([
            'message' => 'Task updated successfully', 
            'data' => new TaskResource($task)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        // return response()->noContent();
        return response()->json([
            'message' => 'Task deleted successfully', 
        ], 200);
    }
}
