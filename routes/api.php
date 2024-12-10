<?php

use App\Models\User;
use Illuminate\Http\Request;

// Get All users
// localhost:8000/api/users
Route::get('users', function () {
    $users = User::all();
    return response()->json([
        "success" => true,
        "messgage" => "Users Retrieved Successfully ",
        "Users_count" => User::count(),
        "data" => $users,
    ], 200);
});
// Add New User
Route::post("/users", function (Request $request) {
    $user = User::create([
        "name" => $request->name,
        "email" => $request->email,
        "password" => $request->password,
    ]);
    return response()->json([
        "success" => true,
        "message" => "User Added Successfully ya Abdelrahman",
        "data" => $user
    ], 201);
});
