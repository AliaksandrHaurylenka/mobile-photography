<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoriesRequest;
use App\Http\Requests\Admin\UpdateCategoriesRequest;

use App\Http\Controllers\Admin\Obj\CRUD;

class CategoriesController extends Controller
{
    private $crud;


    public function __construct()
    {
        $this->crud = new CRUD('category', Category::class);
    }


    public function index()
    {
        $categories = $this->crud->index();
        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        $this->crud->create();
        return view('admin.categories.create');
    }


    public function store(StoreCategoriesRequest $request)
    {
        $this->crud->store($request);
        return redirect()->route('admin.categories.index');
    }



    public function edit($id)
    {
        $category = $this->crud->edit($id);
        return view('admin.categories.edit', compact('category'));
    }


    public function update(UpdateCategoriesRequest $request, $id)
    {
        $this->crud->update($request, $id);
        return redirect()->route('admin.categories.index');
    }



    public function show($id)
    {
        $portfolios = Portfolio::where('category_id', $id)->get();
        $category = $this->crud->show($id);
        return view('admin.categories.show', compact('category', 'portfolios'));
    }



    public function destroy($id)
    {
        $this->crud->destroy($id);
        return redirect()->route('admin.categories.index');
    }


    public function massDestroy(Request $request)
    {
        $this->crud->massDestroy($request);
    }



    public function restore($id)
    {
        $this->crud->restore($id);
        return redirect()->route('admin.categories.index');
    }


    public function perma_del($id)
    {
        $this->crud->perma_del($id);
        return redirect()->route('admin.categories.index');
    }
}
