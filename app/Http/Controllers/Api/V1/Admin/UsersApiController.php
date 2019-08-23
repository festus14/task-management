<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersApiController extends Controller
{
    public function index()
    {
        try {
            $users = User::all();
            return response()->json(['data' => $users], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[], 'message' => $e->getMessage()], 401);
        }

    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'name' => 'required',
                'password' => 'required|min:8',
                'roles.*' => 'integer',
                'roles' => 'required|array',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $user = User::create($request->all());
            return response()->json(['success' => 'record created successfully', 'data' => $user], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'name' => 'required',
                'password' => 'required|min:8',
                'roles.*' => 'integer',
                'roles' => 'required|array',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $updated_user = $user->update($request->all());
            return response()->json(['success' => 'record updated successfully', 'data' => $updated_user], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function show(User $user)
    {
        try {
            return response()->json(['data'=>$user], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json(['success' => 'record deleted successfully'], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to delete record'], 401);
        }
    }
}
