<?php

namespace App\Http\Controllers;

use App\Main;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use App\Program;
use App\MenuSocial;

class MainController extends Controller
{
    public function index()
    {
        $program = Program::all();
        $social = MenuSocial::all();

        return view('site.index', compact('program', 'social'));
    }
}
