<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class TestController extends Controller
{

    public function test(): Response
    {
        return Inertia::render('Test');
    }
}