<?php

namespace App\Http\Controllers\Admin;

use App\MenuSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMenuSocialsRequest;
use App\Http\Requests\Admin\UpdateMenuSocialsRequest;

use App\Http\Controllers\Admin\Obj\CRUD;

class MenuSocialsController extends Controller
{
    protected $crud;
    protected $class = MenuSocial::class;

    
    public function __construct()
    {
        $this->crud = new CRUD('menu_social', MenuSocial::class);
    }


    public function index()
    {
        $data = $this->crud->index();

        return view('admin.menu_socials.index', compact('data'));
    }

    /**
     * Show the form for creating new MenuSocial.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('menu_social_create')) {
            return abort(401);
        }
        return view('admin.menu_socials.create');
    }

    /**
     * Store a newly created MenuSocial in storage.
     *
     * @param  \App\Http\Requests\StoreMenuSocialsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuSocialsRequest $request)
    {
        if (! Gate::allows('menu_social_create')) {
            return abort(401);
        }
        $menu_social = MenuSocial::create($request->all());



        return redirect()->route('admin.menu_socials.index');
    }


    /**
     * Show the form for editing MenuSocial.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('menu_social_edit')) {
            return abort(401);
        }
        $menu_social = MenuSocial::findOrFail($id);

        return view('admin.menu_socials.edit', compact('menu_social'));
    }

    /**
     * Update MenuSocial in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuSocialsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuSocialsRequest $request, $id)
    {
        if (! Gate::allows('menu_social_edit')) {
            return abort(401);
        }
        $menu_social = MenuSocial::findOrFail($id);
        $menu_social->update($request->all());



        return redirect()->route('admin.menu_socials.index');
    }


    /**
     * Display MenuSocial.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('menu_social_view')) {
            return abort(401);
        }
        $menu_social = MenuSocial::findOrFail($id);

        return view('admin.menu_socials.show', compact('menu_social'));
    }


    /**
     * Remove MenuSocial from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('menu_social_delete')) {
            return abort(401);
        }
        $menu_social = MenuSocial::findOrFail($id);
        $menu_social->delete();

        return redirect()->route('admin.menu_socials.index');
    }

    /**
     * Delete all selected MenuSocial at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('menu_social_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = MenuSocial::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore MenuSocial from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('menu_social_delete')) {
            return abort(401);
        }
        $menu_social = MenuSocial::onlyTrashed()->findOrFail($id);
        $menu_social->restore();

        return redirect()->route('admin.menu_socials.index');
    }

    /**
     * Permanently delete MenuSocial from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('menu_social_delete')) {
            return abort(401);
        }
        $menu_social = MenuSocial::onlyTrashed()->findOrFail($id);
        $menu_social->forceDelete();

        return redirect()->route('admin.menu_socials.index');
    }
}
