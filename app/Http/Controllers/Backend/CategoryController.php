<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
{
   private $pathViewController = 'Backend.Pages.Category.';
   private $controllerName = 'category';
   private $params = [];
   private $model;

   public function __construct()
   {
      $this->model = new Category();
      $this->params['pagination']['totalItemsPerPage'] = 10;
      view()->share('controllerName',$this->controllerName);
   }

   public function Index() {

      return Category::groupBy(['Status'])
      ->select( DB::raw('Status, COUNT(Id) as count') )->get();

      $items = $this->model->listItem(null,['task'=>'admin-list-item']);
  
      return View($this->pathViewController.'Index',[
         'items'=> $items
      ]);
   }
   public function bulkaction(Request $request) {
      
      $params = $request->all();
      $this->model->changeBulkActions($params);
      return redirect()->route($this->controllerName);
   }
   public function status(Request $request) {
      $this->params['id'] = $request->id;
      $this->params['status'] = $request->status;
      $this->model->saveItem($this->params,['task'=>'change-status']);
      return redirect()->route($this->controllerName);
   }
   public function ishome(Request $request) {
      $this->params['id'] = $request->id;
      $this->params['ishome'] = $request->ishome;
      $this->model->saveItem($this->params,['task'=>'change-ishome']);
      return redirect()->route($this->controllerName);
   }
   public function delete(Request $request) {
      $this->params['id'] = $request->id;
      $this->model->deleteItem($this->params,['task'=>'delete-single']);
      return redirect()->route($this->controllerName);
   }
}