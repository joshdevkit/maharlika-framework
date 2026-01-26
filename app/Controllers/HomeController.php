<?php

namespace App\Controllers;

use Maharlika\Routing\Attributes\HttpGet;
use Maharlika\Routing\Attributes\Name;
use Maharlika\Routing\Controller;

class HomeController extends Controller
{
    #[HttpGet("/")]
    #[Name("home")]
    public function __invoke()
    {
        return view('welcome');
    }
}
