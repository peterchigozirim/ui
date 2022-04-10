<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function index()
    {
        return Inertia::render('Index');
    }

    public function extract()
    {
        return Inertia::render('Extract/Index');
    }

    public function sendEmail()
    {
        return Inertia::render('Extract/SendEmail');
    }
}
