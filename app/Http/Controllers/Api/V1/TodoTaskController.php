<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\TodoTask;
use App\Http\Requests\V1\TodoTaskRequest;
use App\Http\Resources\V1\TodoTaskResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TodoTaskController extends Controller
{
    public function index(Request $request)
    {
        $todos = TodoTask::with('user')->get();
    
        return TodoTaskResource::collection($todos);
    }

    public function destroy($id)
    {
        $todo = TodoTask::findOrFail($id);
        if ($todo->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    
        $todo->delete();
        return response()->json(['message' => 'Todo deleted successfully']);
    }
    

    public function store(TodoTaskRequest $request)
    {
        $todo = Auth::user()->todos()->create($request->validated());

        return new TodoTaskResource($todo);
    }
}
