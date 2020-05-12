<?php

namespace App\Http\Controllers;

use App\Main;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

use App\Program;
use App\MenuSocial;
use App\MainMenu;
use App\Price;
use App\Category;
use App\Portfolio;

class MainController extends Controller
{
    public function index()
    {
        $program = Program::all();
        $social = MenuSocial::all();
        $main_menu = MainMenu::all();
        $ancors = [
            'portfolio' => DB::table('main_menus')->where('title', 'Портфолио')->value('link'),
            'home' => DB::table('main_menus')->where('title', 'Домой')->value('link'),
            'program' => DB::table('main_menus')->where('title', 'Программа')->value('link'),
            'topay' => DB::table('main_menus')->where('title', 'Оплатить')->value('link'),
            'reviews' => DB::table('main_menus')->where('title', 'Отзывы')->value('link')
        ];
        $prices = Price::all();
        $categories = Category::all();
        $portfolio = Portfolio::all();

        // dd($portfolio_before);

        return view('site.index', compact('program', 'social', 'main_menu', 'ancors', 'prices', 'categories', 'portfolio'));
    }
}
