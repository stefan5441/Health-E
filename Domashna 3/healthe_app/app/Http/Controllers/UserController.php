<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $key = trim($request->get('q'));

        $users = User::query()
            ->where('name', 'like', "%{$key}%")
            ->get();

        return view('results', compact('users'));
    }
}
