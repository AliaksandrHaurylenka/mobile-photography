<?php

namespace App\Http\Controllers;

use App\Main;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class MainController extends Controller
{
    public function index()
    {

        return view('site.index');
    }
}
