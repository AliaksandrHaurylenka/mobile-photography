<?php

namespace App\Http\Controllers\Admin;

use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePortfoliosRequest;
use App\Http\Requests\Admin\UpdatePortfoliosRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class PortfoliosController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Portfolio.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating new Portfolio.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('portfolio_create')) {
            return abort(401);
        }
        
        $categories = \App\Category::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.portfolios.create', compact('categories'));
    }

    /**
     * Store a newly created Portfolio in storage.
     *
     * @param  \App\Http\Requests\StorePortfoliosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortfoliosRequest $request)
    {
        if (! Gate::allows('portfolio_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $portfolio = Portfolio::create($request->all());



        return redirect()->route('admin.portfolios.index');
    }


    /**
     * Show the form for editing Portfolio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('portfolio_edit')) {
            return abort(401);
        }
        
        $categories = \App\Category::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $portfolio = Portfolio::findOrFail($id);

        return view('admin.portfolios.edit', compact('portfolio', 'categories'));
    }

    /**
     * Update Portfolio in storage.
     *
     * @param  \App\Http\Requests\UpdatePortfoliosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfoliosRequest $request, $id)
    {
        if (! Gate::allows('portfolio_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->update($request->all());



        return redirect()->route('admin.portfolios.index');
    }


    /**
     * Display Portfolio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('portfolio_view')) {
            return abort(401);
        }
        $portfolio = Portfolio::findOrFail($id);

        return view('admin.portfolios.show', compact('portfolio'));
    }


    /**
     * Remove Portfolio from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('portfolio_delete')) {
            return abort(401);
        }
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

        return redirect()->route('admin.portfolios.index');
    }

    /**
     * Delete all selected Portfolio at once.
     *
     * @param Request $request
     */
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


    /**
     * Restore Portfolio from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('portfolio_delete')) {
            return abort(401);
        }
        $portfolio = Portfolio::onlyTrashed()->findOrFail($id);
        $portfolio->restore();

        return redirect()->route('admin.portfolios.index');
    }

    /**
     * Permanently delete Portfolio from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('portfolio_delete')) {
            return abort(401);
        }
        $portfolio = Portfolio::onlyTrashed()->findOrFail($id);
        $portfolio->forceDelete();

        return redirect()->route('admin.portfolios.index');
    }
}
