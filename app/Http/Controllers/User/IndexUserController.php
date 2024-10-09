<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       return User::query()->paginate(15);
    }
}
