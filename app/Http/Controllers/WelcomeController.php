<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class WelcomeController extends Controller
{
    public function showWelcome(): Application|Factory|View|Response
    {
        return view('welcome');
    }

}
