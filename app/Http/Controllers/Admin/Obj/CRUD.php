<?php
namespace App\Http\Controllers\Admin\Obj;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class CRUD
{

  private $nameTable;
  private $model;
  // protected $param;
  
 
  public function __construct($name, $model)
    {
      $this->nameTable = $name;
      $this->model =  $model;  
      // $this->param =  $param;  
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

}