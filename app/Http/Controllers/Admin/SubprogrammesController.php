<?php

namespace App\Http\Controllers\Admin;

use App\Subprogramme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSubprogrammesRequest;
use App\Http\Requests\Admin\UpdateSubprogrammesRequest;

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

    /**
     * Show the form for creating new subprogramme.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('subprogramme_create')) {
            return abort(401);
        }

        $programs = \App\Program::get()->pluck('lessons', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.subprogrammes.create', compact('programs'));
    }

    /**
     * Store a newly created Subprogramme in storage.
     *
     * @param  \App\Http\Requests\StoreSubprogrammesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubprogrammesRequest $request)
    {
        if (! Gate::allows('subprogramme_create')) {
            return abort(401);
        }
        
        $subprogramme = Subprogramme::create($request->all());



        return redirect()->route('admin.subprogrammes.index');
    }

    /**
     * Show the form for editing Subprogramme.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('subprogramme_edit')) {
            return abort(401);
        }
        $subprogramme = Subprogramme::findOrFail($id);
        $programs = \App\Program::get()->pluck('lessons', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.subprogrammes.edit', compact('subprogramme', 'programs'));
    }

    /**
     * Update Subprogramme in storage.
     *
     * @param  \App\Http\Requests\UpdateSubprogrammesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubprogrammesRequest $request, $id)
    {
        if (! Gate::allows('subprogramme_edit')) {
            return abort(401);
        }
        $subprogramme = Subprogramme::findOrFail($id);
        $subprogramme->update($request->all());



        return redirect()->route('admin.subprogrammes.index');
    }

    /**
     * Remove Program from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('subprogramme_delete')) {
            return abort(401);
        }
        $subprogramme = Subprogramme::findOrFail($id);
        $subprogramme->delete();

        return redirect()->route('admin.subprogrammes.index');
    }

    /**
     * Delete all selected Program at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('subprogramme_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Subprogramme::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    /**
     * Restore Program from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('subprogramme_delete')) {
            return abort(401);
        }
        $subprogramme = Subprogramme::onlyTrashed()->findOrFail($id);
        $subprogramme->restore();

        return redirect()->route('admin.subprogrammes.index');
    }

    /**
     * Permanently delete Program from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('subprogramme_delete')) {
            return abort(401);
        }
        $subprogramme = subprogramme::onlyTrashed()->findOrFail($id);
        $subprogramme->forceDelete();

        return redirect()->route('admin.subprogrammes.index');
    }

    
}
