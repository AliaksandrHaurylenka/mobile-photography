<?php
namespace App\Http\Controllers\Admin\Obj;

use App\MainMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreMainMenusRequest;

class ObjGate
{

  protected $name;
  
 
  public function __construct($name)
    {
      $this->name = $name;
        
    }

  

  public function gate($action)
  {
    if (! Gate::allows($this->name . '_' . $action)) {
      return abort(401);
    }
  }

}