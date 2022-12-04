<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class MainController extends Controller
{
    public function index()
    {
        if(\Request::ajax() || \Request::header('accept') === 'application/json'){
            return \Response::json([], ResponseAlias::HTTP_NOT_FOUND);
        }

        return \View::make('main');
    }
}
