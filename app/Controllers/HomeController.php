<?php

namespace App\Controllers;

use Maharlika\Routing\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('welcome');
    }
}
