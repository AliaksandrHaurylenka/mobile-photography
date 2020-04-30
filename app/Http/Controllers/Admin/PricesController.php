<?php

namespace App\Http\Controllers\Admin;

use App\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePricesRequest;
use App\Http\Requests\Admin\UpdatePricesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class PricesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Price.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('price_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('price_delete')) {
                return abort(401);
            }
            $prices = Price::onlyTrashed()->get();
        } else {
            $prices = Price::all();
        }

        return view('admin.prices.index', compact('prices'));
    }

    /**
     * Show the form for creating new Price.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('price_create')) {
            return abort(401);
        }
        return view('admin.prices.create');
    }

    /**
     * Store a newly created Price in storage.
     *
     * @param  \App\Http\Requests\StorePricesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePricesRequest $request)
    {
        if (! Gate::allows('price_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $price = Price::create($request->all());



        return redirect()->route('admin.prices.index');
    }


    /**
     * Show the form for editing Price.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('price_edit')) {
            return abort(401);
        }
        $price = Price::findOrFail($id);

        return view('admin.prices.edit', compact('price'));
    }

    /**
     * Update Price in storage.
     *
     * @param  \App\Http\Requests\UpdatePricesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePricesRequest $request, $id)
    {
        if (! Gate::allows('price_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $price = Price::findOrFail($id);
        $price->update($request->all());



        return redirect()->route('admin.prices.index');
    }


    /**
     * Display Price.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('price_view')) {
            return abort(401);
        }
        $price = Price::findOrFail($id);

        return view('admin.prices.show', compact('price'));
    }


    /**
     * Remove Price from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('price_delete')) {
            return abort(401);
        }
        $price = Price::findOrFail($id);
        $price->delete();

        return redirect()->route('admin.prices.index');
    }

    /**
     * Delete all selected Price at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('price_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Price::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Price from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('price_delete')) {
            return abort(401);
        }
        $price = Price::onlyTrashed()->findOrFail($id);
        $price->restore();

        return redirect()->route('admin.prices.index');
    }

    /**
     * Permanently delete Price from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('price_delete')) {
            return abort(401);
        }
        $price = Price::onlyTrashed()->findOrFail($id);
        $price->forceDelete();

        return redirect()->route('admin.prices.index');
    }
}
