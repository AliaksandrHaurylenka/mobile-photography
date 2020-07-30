<?php

namespace App\Http\Controllers\Admin;

use App\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePricesRequest;
use App\Http\Requests\Admin\UpdatePricesRequest;
use App\Http\Controllers\Traits\FileUploadTraitUser;

use App\Http\Controllers\Admin\Obj\CRUD;

class PricesController extends Controller
{
    use FileUploadTraitUser;

    private $crud;


    public function __construct()
    {
        $this->crud = new CRUD('price', Price::class);
    }


    public function index()
    {
        $prices = $this->crud->index();
        return view('admin.prices.index', compact('prices'));
    }

    public function create()
    {
        $this->crud->create();
        return view('admin.prices.create');
    }


    public function store(StorePricesRequest $request)
    {
//        $this->crud->gate('view');
//        $request = $this->saveFiles($request);
//        $price = Price::create($request->all());
        $this->crud->storeSaveFile($request);
        return redirect()->route('admin.prices.index');
    }



    public function edit($id)
    {
        $price = $this->crud->edit($id);
        return view('admin.prices.edit', compact('price'));
    }


    public function update(UpdatePricesRequest $request, $id)
    {
//        $this->crud->gate('edit');
//
//        $price = Price::findOrFail($id);
//        if($_FILES['flag']['name']){
//            $request = $this->saveFiles($request);
//            $price->removeImg();
//        }
//        $price->update($request->all());

        $this->crud->updateSaveFile($request, $id);

        return redirect()->route('admin.prices.index');
    }



    public function show($id)
    {
        $price = $this->crud->show($id);
        return view('admin.prices.show', compact('price'));
    }



    public function destroy($id)
    {
        if (! Gate::allows('price_delete')) {
            return abort(401);
        }
        $price = Price::findOrFail($id);
        $price->delete();

        return redirect()->route('admin.prices.index');
    }


    public function massDestroy(Request $request)
    {
        $this->crud->massDestroy($request);
    }



    public function restore($id)
    {
        $this->crud->restore($id);
        return redirect()->route('admin.prices.index');
    }


    public function perma_del($id)
    {
        if (! Gate::allows('price_delete')) {
            return abort(401);
        }
        $price = Price::onlyTrashed()->findOrFail($id);
        $price->forceDelete();
        $price->remove();

        return redirect()->route('admin.prices.index');
    }
}
