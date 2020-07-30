<?php
namespace App\Http\Controllers\Admin\Obj;


use App\Http\Controllers\Traits\FileUploadTraitUser;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Admin\UserInterface\CRUDInterface;



class CRUD implements CRUDInterface
{
    use FileUploadTraitUser;

  private $nameTable;
  private $model;


  public function __construct($name, $model)
    {
      $this->nameTable = $name;
      $this->model =  $model;
    }



  public function gate($action)
  {
    if (! Gate::allows($this->nameTable . '_' . $action)) {
      return abort(401);
    }
  }


  public function index()
  {
    if (request('show_deleted') == 1) {
      $this->gate('delete');

      $nameTable = $this->model::onlyTrashed()->get();
    } else {
      $nameTable = $this->model::all();
    }

    return $nameTable;
  }


  public function create()
  {
    return $this->gate('create');
  }


  public function store($request)
  {
    $this->gate('create');

    $main_menu = $this->model::create($request->all());
  }


  public function edit($id)
  {
    $this->gate('edit');

    return $this->model::findOrFail($id);
  }


  public function update($request, $id)
  {
    $this->gate('edit');

    $data = $this->model::findOrFail($id);
    $data->update($request->all());
  }


  public function show($id)
  {
    $this->gate('view');

    return $this->model::findOrFail($id);
  }


  public function destroy($id)
  {
    $this->gate('delete');

    $data = $this->model::findOrFail($id);
    $data->delete();
  }


  public function massDestroy($request)
  {
      $this->gate('delete');

      if ($request->input('ids')) {
        $entries = $this->model::whereIn('id', $request->input('ids'))->get();

        foreach ($entries as $entry) {
            $entry->delete();
        }
      }
  }


  public function restore($id)
  {
    $this->gate('delete');

    $data = $this->model::onlyTrashed()->findOrFail($id);
    $data->restore();
  }


  public function perma_del($id)
  {
    $this->gate('delete');

    $data = $this->model::onlyTrashed()->findOrFail($id);
    $data->forceDelete();
  }



  // Работа с файлами
  public function storeSaveFile($request)
  {
      $this->gate('create');
      $request = $this->saveFiles($request);
      $this->model::create($request->all());
  }


  public function updateSaveFile($request, $id)
  {
      $this->gate('edit');

      $data = $this->model::findOrFail($id);
      if($_FILES['flag']['name']){
          $request = $this->saveFiles($request);
          $data->removeImg();
      }
      $data->update($request->all());
  }

  public function check_file()
  {
      if($_FILES['photo']['name']){
          $request = $this->saveFiles($request);
          $portfolio->removePhoto('photo');
      }
  }

}
