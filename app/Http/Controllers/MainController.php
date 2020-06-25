<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

use App\Program;
use App\Subprogramme;
use App\MenuSocial;
use App\MainMenu;
use App\Price;
use App\Category;
use App\Portfolio;
use App\Comment;

class MainController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        $subprogramme = Subprogramme::all();
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
        $portfolio = Portfolio::whereNotNull('category_id')->get();        
        $mobil_photo = [
          'before' => DB::table('portfolios')->whereNull('category_id')->value('photo'),
          'after' => DB::table('portfolios')->whereNull('category_id')->value('photo_after'),
        ];
        $main_images = [
          'main' => DB::table('photo_image_pages')->where('section', 'Главное изображение')->value('photo'),
          'block1' => DB::table('photo_image_pages')->where('section', 'Блок 1')->value('photo'),
          'block2' => DB::table('photo_image_pages')->where('section', 'Блок 2')->value('photo'),
        ];

        $comments = Comment::where('status', 'active')->orderBy('id', 'desc')->paginate(3);
        

        // dd($sub_programs);

        return view('site.index', compact('programs', 
                                          'subprogramme', 
                                          'social', 
                                          'main_menu', 
                                          'ancors', 
                                          'prices', 
                                          'categories', 
                                          'portfolio', 
                                          'main_images', 
                                          'mobil_photo', 
                                          'comments'));
    }

    
    public function topay(Request $request)
    {

      if ($request->isMethod('post')) {

        $messages = [
          'required' => 'Поле :attribute обязательно к заполнению',
          'email' => 'Поле :attribute должно быть email адресом',
        ];

        $this->validate($request, [
          'email' => 'required|email',
          'name' => 'required|max:255',
        ], $messages);

        $data = $request->all();

      }
    }
}
