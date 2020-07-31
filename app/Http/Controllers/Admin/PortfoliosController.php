<?php

namespace App\Http\Controllers\Admin;

use App\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePortfoliosRequest;
use App\Http\Requests\Admin\UpdatePortfoliosRequest;
use App\Http\Controllers\Admin\Obj\CRUDFile;

class PortfoliosController extends Controller
{

    private $crud;


    public function __construct()
    {
        $this->crud = new CRUDFile('portfolio', Portfolio::class);
    }


    public function index()
    {
//        $this->crud->gate('delete');
//
//
//        if (request('show_deleted') == 1) {
//            $this->crud->gate('delete');
//            $portfolios = Portfolio::onlyTrashed()->get();
//        } else {
//            $portfolios = Portfolio::select(['id', 'photo', 'photo_after', 'category_id'])->latest()->get();
//        }
        $portfolios = $this->crud->index();

        return view('admin.portfolios.index', compact('portfolios'));
    }


    public function create()
    {
        $this->crud->create();
        $categories = \App\Category::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        return view('admin.portfolios.create', compact('categories'));
    }


    public function store(StorePortfoliosRequest $request)
    {
        $this->crud->store($request);
        return redirect()->route('admin.portfolios.index');
    }



    public function edit($id)
    {
        $portfolio = $this->crud->edit($id);
        $categories = \App\Category::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        return view('admin.portfolios.edit', compact('portfolio', 'categories'));
    }


    public function update(UpdatePortfoliosRequest $request, $id)
    {
        $this->crud->update_file($request, $id, ['photo', 'photo_after']);
        return redirect()->route('admin.portfolios.index');
    }



    public function show($id)
    {
        $portfolio = $this->crud->show($id);
        return view('admin.portfolios.show', compact('portfolio'));
    }



    public function destroy($id)
    {
        $this->crud->destroy($id);
        return redirect()->route('admin.portfolios.index');
    }


    public function massDestroy(Request $request)
    {
        $this->crud->massDestroy($request);
    }



    public function restore($id)
    {
        $this->crud->restore($id);
        return redirect()->route('admin.portfolios.index');
    }


    public function perma_del($id)
    {
        $this->crud->perma_del_file($id, ['photo', 'photo_after']);
        return redirect()->route('admin.portfolios.index');
    }
}
