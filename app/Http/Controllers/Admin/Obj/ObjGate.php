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

}