<?php
namespace App\Http\Controllers\Admin\Obj;

use App\MainMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreMainMenusRequest;

class ObjGate
{

  protected $nameTable;
  protected $model;
  
 
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


  public function index($path, $param)
  {
    if (request('show_deleted') == 1) {
      $this->gate('delete');
      
      $main_menus = $this->model::onlyTrashed()->get();
      // $this->model::onlyTrashed()->get();
    } else {
      $main_menus = $this->model::all();
      // $this->model::all();
    }

    return view($path, compact($param));
    // return $main_menus;
  }

}