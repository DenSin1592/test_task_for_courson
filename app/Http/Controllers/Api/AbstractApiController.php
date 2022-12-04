<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;


abstract class AbstractApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
