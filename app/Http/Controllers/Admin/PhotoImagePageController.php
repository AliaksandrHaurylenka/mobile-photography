<?php

namespace App\Http\Controllers\Admin;

use App\PhotoImagePage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePhotoImagePagesRequest;
use App\Http\Requests\Admin\UpdatePhotoImagePagesRequest;

use App\Http\Controllers\Admin\Obj\CRUDFile;


class PhotoImagePageController extends Controller
{
    private $crud;


    public function __construct()
    {
        $this->crud = new CRUDFile('photo_image_page', PhotoImagePage::class);
    }



    public function index()
    {
        $photo_image_pages = $this->crud->index();
        return view('admin.photo_image_pages.index', compact('photo_image_pages'));
    }


    public function create()
    {
        $this->crud->create();
        return view('admin.photo_image_pages.create');
    }


    public function store(StorePhotoImagePagesRequest $request)
    {
        $this->crud->store($request);
        return redirect()->route('admin.photo_image_pages.index');
    }



    public function edit($id)
    {
        $photoImagePage = $this->crud->edit($id);
        return view('admin.photo_image_pages.edit', compact('photoImagePage'));
    }


    public function update(UpdatePhotoImagePagesRequest $request, $id)
    {
        $this->crud->update_file($request, $id, ['photo']);
        return redirect()->route('admin.photo_image_pages.index');
    }


    public function destroy($id)
    {
        $this->crud->destroy($id);
        return redirect()->route('admin.photo_image_pages.index');
    }


    public function massDestroy(Request $request)
    {
        $this->crud->massDestroy($request);
    }



    public function restore($id)
    {
        $this->crud->restore($id);
        return redirect()->route('admin.photo_image_pages.index');
    }


    public function perma_del($id)
    {
        $this->crud->perma_del_file($id, ['photo']);
        return redirect()->route('admin.photo_image_pages.index');
    }
}
