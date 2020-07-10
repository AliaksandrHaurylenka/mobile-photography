<?php

namespace App\Http\Controllers\Admin;

use App\MainMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMainMenusRequest;
use App\Http\Requests\Admin\UpdateMainMenusRequest;

use App\Http\Controllers\Admin\Obj\ObjMainMenu;


class MainMenusController extends Controller
{
    protected $obj;

    public function __construct()
    {
        // $this->obj = new ObjMainMenu('main_menu_delete', 'main_menu_delete', 'main_menu_create');
        $this->obj = new ObjMainMenu('main_menu', 'main_menu_access');
       
    }
    // use ObjMainMenu;

    public function index()
    {
        // if (! Gate::allows('main_menu_access')) {
        //     return abort(401);
        // }


        // if (request('show_deleted') == 1) {
        //     if (! Gate::allows('main_menu_delete')) {
        //         return abort(401);
        //     }
        //     $main_menus = MainMenu::onlyTrashed()->get();
        // } else {
        //     $main_menus = MainMenu::all();
        // }
        // $main_menus = new ObjMainMenu();
        $main_menus = $this->obj->getItems();
        // dd($main_menus);

        return view('admin.main_menus.index', compact('main_menus'));
    }

    
    public function create()
    {
        // if (! Gate::allows('main_menu_create')) {
        //     return abort(401);
        // }

        $this->obj->viewCreateItems('_create');
        
        return view('admin.main_menus.create');
    }

    
    public function store(StoreMainMenusRequest $request)
    {
        if (! Gate::allows('main_menu_create')) {
            return abort(401);
        }
        $main_menu = MainMenu::create($request->all());

        // $this->obj->add($request);

        return redirect()->route('admin.main_menus.index');
    }


    
    public function edit($id)
    {
        if (! Gate::allows('main_menu_edit')) {
            return abort(401);
        }
        $main_menu = MainMenu::findOrFail($id);

        return view('admin.main_menus.edit', compact('main_menu'));
    }

    
    public function update(UpdateMainMenusRequest $request, $id)
    {
        if (! Gate::allows('main_menu_edit')) {
            return abort(401);
        }
        $main_menu = MainMenu::findOrFail($id);
        $main_menu->update($request->all());

        return redirect()->route('admin.main_menus.index');
    }


    
    public function show($id)
    {
        if (! Gate::allows('main_menu_view')) {
            return abort(401);
        }
        $main_menu = MainMenu::findOrFail($id);

        return view('admin.main_menus.show', compact('main_menu'));
    }


   
    public function destroy($id)
    {
        if (! Gate::allows('main_menu_delete')) {
            return abort(401);
        }
        $main_menu = MainMenu::findOrFail($id);
        $main_menu->delete();

        return redirect()->route('admin.main_menus.index');
    }

    
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('main_menu_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = MainMenu::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    
    public function restore($id)
    {
        if (! Gate::allows('main_menu_delete')) {
            return abort(401);
        }
        $main_menu = MainMenu::onlyTrashed()->findOrFail($id);
        $main_menu->restore();

        return redirect()->route('admin.main_menus.index');
    }

    
    public function perma_del($id)
    {
        if (! Gate::allows('main_menu_delete')) {
            return abort(401);
        }
        $main_menu = MainMenu::onlyTrashed()->findOrFail($id);
        $main_menu->forceDelete();

        return redirect()->route('admin.main_menus.index');
    }
}
