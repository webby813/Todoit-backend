<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\TodoTask;
use App\Http\Requests\V1\TodoTaskRequest;
use App\Http\Resources\V1\TodoTaskResource;
use Illuminate\Support\Facades\Auth;

class TodoTaskController extends Controller
{
    public function store(TodoTaskRequest $request)
    {
        $todo = Auth::user()->todos()->create($request->validated());

        return new TodoTaskResource($todo);
    }
}
