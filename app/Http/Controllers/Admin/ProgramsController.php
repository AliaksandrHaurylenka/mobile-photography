<?php

namespace App\Http\Controllers\Admin;

use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProgramsRequest;
use App\Http\Requests\Admin\UpdateProgramsRequest;

use App\Http\Controllers\Admin\Obj\CRUD;

class ProgramsController extends Controller
{
    private $crud;


    public function __construct()
    {
        $this->crud = new CRUD('program', Program::class);
    }
    public function index()
    {
        $programs = $this->crud->index();
        return view('admin.programs.index', compact('programs'));
    }


    public function create()
    {
        $this->crud->create();
        return view('admin.programs.create');
    }


    public function store(StoreProgramsRequest $request)
    {
        $this->crud->store($request);
        return redirect()->route('admin.programs.index');
    }



    public function edit($id)
    {
        $program = $this->crud->edit($id);
        return view('admin.programs.edit', compact('program'));
    }


    public function update(UpdateProgramsRequest $request, $id)
    {
        $this->crud->update($request, $id);
        return redirect()->route('admin.programs.index');
    }



    public function show($id)
    {
        $program = $this->crud->show($id);
        return view('admin.programs.show', compact('program'));
    }



    public function destroy($id)
    {
        $this->crud->destroy($id);
        return redirect()->route('admin.programs.index');
    }


    public function massDestroy(Request $request)
    {
        $this->crud->massDestroy($request);
    }



    public function restore($id)
    {
        $this->crud->restore($id);
        return redirect()->route('admin.programs.index');
    }


    public function perma_del($id)
    {
        $this->crud->perma_del($id);
        return redirect()->route('admin.programs.index');
    }
}
