<?php

namespace App\Http\Controllers\Admin;

use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FileUploadTraitUser;
use App\Http\Requests\Admin\StorePortfoliosRequest;
use App\Http\Requests\Admin\UpdatePortfoliosRequest;

use App\Http\Controllers\Admin\Obj\CRUD;

class PortfoliosController extends Controller
{
    use FileUploadTraitUser;
    private $crud;


    public function __construct()
    {
        $this->crud = new CRUD('portfolio', Portfolio::class);
    }


    public function index()
    {
        if (! Gate::allows('portfolio_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('portfolio_delete')) {
                return abort(401);
            }
            $portfolios = Portfolio::onlyTrashed()->get();
        } else {
            $portfolios = Portfolio::select(['id', 'photo', 'photo_after', 'category_id'])->latest()->get();
        }

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
        $this->crud->storeSaveFile($request);
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
//        if (! Gate::allows('portfolio_edit')) {
//            return abort(401);
//        }
//
//        $portfolio = Portfolio::findOrFail($id);
//        if($_FILES['photo']['name']){
//            $request = $this->saveFiles($request);
//            $portfolio->removePhoto('photo');
//        }
//        if($_FILES['photo_after']['name']){
//            $request = $this->saveFiles($request);
//            $portfolio->removePhoto('photo_after');
//        }
//
//        $portfolio->update($request->all());

        $this->crud->updateSaveFile($request, $id, 'photo');
        $this->crud->updateSaveFile($request, $id, 'photo_after');

        return redirect()->route('admin.portfolios.index');
    }



    public function show($id)
    {

        $portfolio = $this->crud->show($id);
        return view('admin.portfolios.show', compact('portfolio'));
    }



    public function destroy($id)
    {
        if (! Gate::allows('portfolio_delete')) {
            return abort(401);
        }
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

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
        if (! Gate::allows('portfolio_delete')) {
            return abort(401);
        }
        $portfolio = Portfolio::onlyTrashed()->findOrFail($id);
        $portfolio->forceDelete();
        $portfolio->remove();

        return redirect()->route('admin.portfolios.index');
    }
}
