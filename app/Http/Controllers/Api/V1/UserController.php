<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Todo_user;
use App\Http\Resources\V1\UserResource;
use App\Http\Requests\V1\StoreUserRequest;


class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']); // Hash it!
    
        return new UserResource(Todo_user::create($validated));
    }
}
