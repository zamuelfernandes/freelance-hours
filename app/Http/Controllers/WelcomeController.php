<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = User::find(1);
        //     $user = User::query()->create([
        //     'name' => 'Samuel',
        //     'email' => 'samuel@mail.com',
        //     'password' => 'abc123',
        // ]);

        dd($user);


        return view('welcome');
    }
}