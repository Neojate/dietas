<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function __construct() {
        $this->middleware('auth');

        if (is_null(auth()->user())) {
            abort(403);
        }
    }
}
