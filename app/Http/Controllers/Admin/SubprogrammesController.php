<?php

namespace App\Http\Controllers\Admin;

use App\Subprogramme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSubprogrammesRequest;
use App\Http\Requests\Admin\UpdateSubprogrammesRequest;

use App\Http\Controllers\Admin\Obj\CRUD;

class SubprogrammesController extends Controller
{
    private $crud;


    public function __construct()
    {
        $this->crud = new CRUD('subprogramme', Subprogramme::class);
    }


    public function index()
    {
        $subprogrammes = $this->crud->index();
        return view('admin.subprogrammes.index', compact('subprogrammes'));
    }


    public function create()
    {
        $this->crud->create();
        $programs = \App\Program::get()->pluck('lessons', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        return view('admin.subprogrammes.create', compact('programs'));
    }


    public function store(StoreSubprogrammesRequest $request)
    {
        $this->crud->store($request);
        return redirect()->route('admin.subprogrammes.index');
    }


    public function edit($id)
    {
        $subprogramme = $this->crud->edit($id);
        $programs = \App\Program::get()->pluck('lessons', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        return view('admin.subprogrammes.edit', compact('subprogramme', 'programs'));
    }


    public function update(UpdateSubprogrammesRequest $request, $id)
    {
        $this->crud->update($request, $id);
        return redirect()->route('admin.subprogrammes.index');
    }


    public function destroy($id)
    {
        $this->crud->destroy($id);
        return redirect()->route('admin.subprogrammes.index');
    }


    public function massDestroy(Request $request)
    {
        $this->crud->massDestroy($request);
    }


    public function restore($id)
    {
        $this->crud->restore($id);
        return redirect()->route('admin.subprogrammes.index');
    }


    public function perma_del($id)
    {
        $this->crud->perma_del($id);
        return redirect()->route('admin.subprogrammes.index');
    }


}
