<?php

namespace App\Http\Controllers\Admin;

use App\MenuSocial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMenuSocialsRequest;
use App\Http\Requests\Admin\UpdateMenuSocialsRequest;

use App\Http\Controllers\Admin\Obj\CRUD;

class MenuSocialsController extends Controller
{
    private $crud;


    public function __construct()
    {
        $this->crud = new CRUD('menu_social', MenuSocial::class);
    }


    public function index()
    {
        $data = $this->crud->index();

        return view('admin.menu_socials.index', compact('data'));
    }


    public function create()
    {
        $this->crud->create();
        return view('admin.menu_socials.create');
    }


    public function store(StoreMenuSocialsRequest $request)
    {
        $this->crud->store($request);
        return redirect()->route('admin.menu_socials.index');
    }



    public function edit($id)
    {
        $menu_social = $this->crud->edit($id);
        return view('admin.menu_socials.edit', compact('menu_social'));
    }


    public function update(UpdateMenuSocialsRequest $request, $id)
    {
        $this->crud->update($request, $id);
        return redirect()->route('admin.menu_socials.index');
    }



    public function show($id)
    {
        $menu_social = $this->crud->show($id);
        return view('admin.menu_socials.show', compact('menu_social'));
    }



    public function destroy($id)
    {
        $this->crud->destroy($id);
        return redirect()->route('admin.menu_socials.index');
    }


    public function massDestroy(Request $request)
    {
        $this->crud->massDestroy($request);
    }



    public function restore($id)
    {
        $this->crud->restore($id);
        return redirect()->route('admin.menu_socials.index');
    }


    public function perma_del($id)
    {
        $this->crud->perma_del($id);
        return redirect()->route('admin.menu_socials.index');
    }
}
