<?php

namespace App\Http\Controllers\Admin;

use App\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePricesRequest;
use App\Http\Requests\Admin\UpdatePricesRequest;


use App\Http\Controllers\Admin\Obj\CRUDFile;

class PricesController extends Controller
{


    private $crud;


    public function __construct()
    {
        $this->crud = new CRUDFile('price', Price::class);
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
        $this->crud->store($request);
        return redirect()->route('admin.prices.index');
    }



    public function edit($id)
    {
        $price = $this->crud->edit($id);
        return view('admin.prices.edit', compact('price'));
    }


    public function update(UpdatePricesRequest $request, $id)
    {
        $this->crud->update_file($request, $id, ['flag']);
        return redirect()->route('admin.prices.index');
    }



    public function show($id)
    {
        $price = $this->crud->show($id);
        return view('admin.prices.show', compact('price'));
    }



    public function destroy($id)
    {
        $this->crud->destroy($id);
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
        $this->crud->perma_del_file($id, ['flag']);
        return redirect()->route('admin.prices.index');
    }
}
