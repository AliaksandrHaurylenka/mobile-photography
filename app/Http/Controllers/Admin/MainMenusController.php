<?php

namespace App\Http\Controllers\Admin;

use App\MainMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMainMenusRequest;
use App\Http\Requests\Admin\UpdateMainMenusRequest;

use App\Http\Controllers\Admin\Obj\CRUD;


class MainMenusController extends Controller
{
    /**
     * @param $crud string //имя таблицы в единственном числе
     */
    protected $crud;
    protected $class = MainMenu::class;

    
    public function __construct()
    {
        $this->crud = new CRUD('main_menu', MainMenu::class);
    }

    public function index()
    {

        // if (request('show_deleted') == 1) {
        //     $this->crud->gate('delete');
            
        //     $main_menus = MainMenu::onlyTrashed()->get();
        // } else {
        //     $main_menus = MainMenu::all();
        // }

        // dd($main_menus);


        
        $data = $this->crud->index();

        return view('admin.main_menus.index', compact('data'));
    }

    
    public function create()
    {
        $this->crud->create();
        
        return view('admin.main_menus.create');
    }

    
    public function store(StoreMainMenusRequest $request)
    {
        $this->crud->store($request);

        // $main_menu = MainMenu::create($request->all());

        return redirect()->route('admin.main_menus.index');
    }


    
    public function edit($id)
    {
        // $main_menu = MainMenu::findOrFail($id);
        $data = $this->crud->edit($id);

        return view('admin.main_menus.edit', compact('data'));
    }

    
    public function update(UpdateMainMenusRequest $request, $id)
    {
        $this->crud->gate('edit');

        $main_menu = MainMenu::findOrFail($id);
        $main_menu->update($request->all());

        return redirect()->route('admin.main_menus.index');
    }


    
    public function show($id)
    {
         $this->crud->gate('view');
        $main_menu = MainMenu::findOrFail($id);

        return view('admin.main_menus.show', compact('main_menu'));
    }


   
    public function destroy($id)
    {
        $this->crud->gate('delete');

        $main_menu = MainMenu::findOrFail($id);
        $main_menu->delete();

        return redirect()->route('admin.main_menus.index');
    }

    
    public function massDestroy(Request $request)
    {
        $this->crud->gate('delete');

        if ($request->input('ids')) {
            $entries = MainMenu::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    
    public function restore($id)
    {
        $this->crud->gate('delete');

        $main_menu = MainMenu::onlyTrashed()->findOrFail($id);
        $main_menu->restore();

        return redirect()->route('admin.main_menus.index');
    }

    
    public function perma_del($id)
    {
        $this->crud->gate('delete');

        $main_menu = MainMenu::onlyTrashed()->findOrFail($id);
        $main_menu->forceDelete();

        return redirect()->route('admin.main_menus.index');
    }
}
