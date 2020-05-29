<?php

namespace App\Http\Controllers\Admin;

use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FileUploadTraitUser;
use App\Http\Requests\Admin\StorePortfoliosRequest;
use App\Http\Requests\Admin\UpdatePortfoliosRequest;

class PortfoliosController extends Controller
{
    use FileUploadTraitUser;

    
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
            $portfolios = Portfolio::all();
        }

        return view('admin.portfolios.index', compact('portfolios'));
    }

   
    public function create()
    {
        if (! Gate::allows('portfolio_create')) {
            return abort(401);
        }

        $categories = \App\Category::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.portfolios.create', compact('categories'));
    }

    
    public function store(StorePortfoliosRequest $request)
    {
        if (! Gate::allows('portfolio_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $portfolio = Portfolio::create($request->all());



        return redirect()->route('admin.portfolios.index');
    }


    
    public function edit($id)
    {
        if (! Gate::allows('portfolio_edit')) {
            return abort(401);
        }

        $categories = \App\Category::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $portfolio = Portfolio::findOrFail($id);

        return view('admin.portfolios.edit', compact('portfolio', 'categories'));
    }

    
    public function update(UpdatePortfoliosRequest $request, $id)
    {
        if (! Gate::allows('portfolio_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $portfolio = Portfolio::findOrFail($id);
        if($_FILES['photo']['name']){
            // $portfolio->removeImg();
            if ($portfolio->photo != null) {
                unlink(public_path(Portfolio::PATH . $portfolio->photo));
            }
        }
        if($_FILES['photo_after']['name']){
            // $portfolio->removeImg();
            if ($portfolio->photo_after != null) {
                unlink(public_path(Portfolio::PATH . $portfolio->photo_after));
            }
        }
        $portfolio->update($request->all());



        return redirect()->route('admin.portfolios.index');
    }


    
    public function show($id)
    {
        if (! Gate::allows('portfolio_view')) {
            return abort(401);
        }
        $portfolio = Portfolio::findOrFail($id);

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
        if (! Gate::allows('portfolio_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Portfolio::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    
    public function restore($id)
    {
        if (! Gate::allows('portfolio_delete')) {
            return abort(401);
        }
        $portfolio = Portfolio::onlyTrashed()->findOrFail($id);
        $portfolio->restore();

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
