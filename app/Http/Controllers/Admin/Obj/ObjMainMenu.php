<?php
namespace App\Http\Controllers\Admin\Obj;

use App\MainMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreMainMenusRequest;

class ObjMainMenu
{

  protected $items;
  protected $name;
  protected $access;
  // protected $delete;
  // protected $create;

  // public function __construct($access, $delete, $create)
  public function __construct($name, $access)
    {
        $this->access = $access;
        // $this->delete = $delete;
        // $this->create = $create;
        $this->name = $name;
        
    }

  public function getItems()
  {
      if (! Gate::allows($this->access)) {
        return abort(401);
      }


      if (request('show_deleted') == 1) {
          if (! Gate::allows($this->delete)) {
              return abort(401);
          }
          $this->items = MainMenu::onlyTrashed()->get();
      } else {
          $this->items = MainMenu::all();
      }
      return $this->items;
  }

  public function viewCreateItems($action)
  {
    if (! Gate::allows($this->name . $action)) {
      return abort(401);
    }
  }

  // public function add(StoreMainMenusRequest $request)
  // {
  //   if (! Gate::allows($this->create)) {
  //     return abort(401);
  // }
  //   $main_menu = MainMenu::create($request->all());
  // }

}