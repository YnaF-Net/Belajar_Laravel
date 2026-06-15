<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = User::latest()->get();
            return response()->json([
                'success' => true,
                'message' => 'Fetch User Success',
                'data' => $users
            ]);
            // akan keluar status = 200 (menampilkan data)
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Fetch User Fail!',
                'error' => $th->getMessage()
            ], 500);
            // akan keluar status = 400/500 (menampilkan error)
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:6'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error Validation',
                    'error' => $validator->errors(),
                ], 422);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'create user success',
                'data' => $user,
            ], 201);
            // semua data baru successnya 201
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Create user fail !!!',
                'error' => $th->getMessage(),
            ], 500);
            // eror server
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        try {
            return response()->json([
                'status' => 'success',
                'message' => 'Fetch Detail User Success',
                'data' => $user,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Fetch Detail User Fail!',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:users,email,'. $user->id,
                'password' => 'required|min:6'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error Validation',
                    'error' => $validator->errors(),
                ], 422);
            }

            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            if($request->filled('password')) {
                $data['password'] = $request->password;
            }

            $user->update($data);
            return response()->json([
                'success' => true,
                'message' => 'Update User Success',
                'data' => $user,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Update User FAIL!!',
                'data' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'Delete User Success',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'massage' => 'Delete User Fail!!',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
