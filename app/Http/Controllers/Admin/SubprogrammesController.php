<?php

namespace App\Http\Controllers\Admin;

use App\Subprogramme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\StorePortfoliosRequest;

class SubprogrammesController extends Controller
{
    

    /**
     * Display a listing of Portfolio.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('subprogramme_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('subprogramme_delete')) {
                return abort(401);
            }
            $subprogrammes = Subprogramme::onlyTrashed()->get();
        } else {
            $subprogrammes = Subprogramme::all();
        }

        return view('admin.subprogrammes.index', compact('subprogrammes'));
    }

    
}
