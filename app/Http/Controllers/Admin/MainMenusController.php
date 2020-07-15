<?php

namespace App\Http\Controllers\Admin;

use App\MainMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMainMenusRequest;
use App\Http\Requests\Admin\UpdateMainMenusRequest;

use App\Http\Controllers\Admin\Obj\ObjGate;


class MainMenusController extends Controller
{
    protected $objgate;

    public function __construct()
    {
        $this->objgate = new ObjGate('main_menu');
       
    }

    public function index()
    {
        
        $this->objgate->gate('access');

        if (request('show_deleted') == 1) {
            $this->objgate->gate('delete');
            
            $main_menus = MainMenu::onlyTrashed()->get();
        } else {
            $main_menus = MainMenu::all();
        }

        return view('admin.main_menus.index', compact('main_menus'));
    }

    
    public function create()
    {
        $this->objgate->gate('create');
        
        return view('admin.main_menus.create');
    }

    
    public function store(StoreMainMenusRequest $request)
    {
        $this->objgate->gate('create');

        $main_menu = MainMenu::create($request->all());

        return redirect()->route('admin.main_menus.index');
    }


    
    public function edit($id)
    {
        $this->objgate->gate('edit');

        $main_menu = MainMenu::findOrFail($id);

        return view('admin.main_menus.edit', compact('main_menu'));
    }

    
    public function update(UpdateMainMenusRequest $request, $id)
    {
        $this->objgate->gate('edit');

        $main_menu = MainMenu::findOrFail($id);
        $main_menu->update($request->all());

        return redirect()->route('admin.main_menus.index');
    }


    
    public function show($id)
    {
         $this->objgate->gate('view');
        $main_menu = MainMenu::findOrFail($id);

        return view('admin.main_menus.show', compact('main_menu'));
    }


   
    public function destroy($id)
    {
        $this->objgate->gate('delete');

        $main_menu = MainMenu::findOrFail($id);
        $main_menu->delete();

        return redirect()->route('admin.main_menus.index');
    }

    
    public function massDestroy(Request $request)
    {
        $this->objgate->gate('delete');

        if ($request->input('ids')) {
            $entries = MainMenu::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    
    public function restore($id)
    {
        $this->objgate->gate('delete');

        $main_menu = MainMenu::onlyTrashed()->findOrFail($id);
        $main_menu->restore();

        return redirect()->route('admin.main_menus.index');
    }

    
    public function perma_del($id)
    {
        $this->objgate->gate('delete');

        $main_menu = MainMenu::onlyTrashed()->findOrFail($id);
        $main_menu->forceDelete();

        return redirect()->route('admin.main_menus.index');
    }
}
