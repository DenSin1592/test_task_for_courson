<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function index()
    {
        if(\Request::ajax() || \Request::header('accept') === 'application/json'){
            return \Response::json([], 404);
        }

        return \View::make('main');
    }
}
