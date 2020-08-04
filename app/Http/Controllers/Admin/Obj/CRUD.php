<?php
namespace App\Http\Controllers\Admin\Obj;


use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Admin\UserInterface\CRUDInterface;



class CRUD implements CRUDInterface
{

  private $nameTable;
  private $model;
  private $delete;
  private $create;
  private $edit;
  private $view;


  public function __construct($name, $model, $delete, $create, $edit, $view)
    {
      $this->nameTable = $name;
      $this->model =  $model;
      $this->delete = $delete;
      $this->create = $create;
      $this->edit = $edit;
      $this->view = $view;
    }



  protected function gate($action)
  {
    if (! Gate::allows($this->nameTable . '_' . $action)) {
      return abort(401);
    }
  }


  public function index()
  {
    if (request('show_deleted') == 1) {
      $this->gate($this->delete);

      $nameTable = $this->model::onlyTrashed()->get();
    } else {
      $nameTable = $this->model::all();
    }

    return $nameTable;
  }


  public function create()
  {
    return $this->gate($this->create);
  }


  public function store($request)
  {
    $this->gate($this->create);
    $this->model::create($request->all());
  }


  public function edit($id)
  {
    $this->gate($this->edit);
    return $this->model::findOrFail($id);
  }


  public function update($request, $id)
  {
    $this->gate($this->edit);

    $data = $this->model::findOrFail($id);
    $data->update($request->all());
  }


  public function show($id)
  {
    $this->gate($this->view);

    return $this->model::findOrFail($id);
  }


  public function destroy($id)
  {
    $this->gate($this->delete);

    $data = $this->model::findOrFail($id);
    $data->delete();
  }


  public function massDestroy($request)
  {
      $this->gate($this->delete);

      if ($request->input('ids')) {
        $entries = $this->model::whereIn('id', $request->input('ids'))->get();

        foreach ($entries as $entry) {
            $entry->delete();
        }
      }
  }


  public function restore($id)
  {
    $this->gate($this->delete);

    $data = $this->model::onlyTrashed()->findOrFail($id);
    $data->restore();
  }


  public function perma_del($id)
  {
    $this->gate($this->delete);

    $data = $this->model::onlyTrashed()->findOrFail($id);
    $data->forceDelete();
  }

}
