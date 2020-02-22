<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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

      $items = $this->model->listItem(null,['task'=>'admin-list-item']);
      // echo '<pre>';
      // print_r($items);
      // echo '</pre>';
      // die;
      return View($this->pathViewController.'Index',[
         'items'=> $items
      ]);
   }
   public function changeDisplayMulti(Request $request) {
      $params = $request->all();
      $ids = $params['cid'];
      $vals = $params['display'];
      foreach($ids as $key => $id) {
         Category::find($id)->update(['Display'=>$vals[$key]]);
      }
      return redirect()->route('category');
   }
   public function changeOrderingMulti(Request $request) {
      $params = $request->all();
      $ids = $params['cid'];
      $vals = $params['ordering'];
      foreach($ids as $key => $id) {
         Category::find($id)->update(['Stt'=>$vals[$key]]);
      }
      return redirect()->route('category');
   }
   public function changeIsHomeMulti(Request $request) {
      $params = $request->all();
      $ids = $params['cid'];
      $vals = $params['ishome'];
      foreach($ids as $key => $id) {
         Category::find($id)->update(['isHome'=>$vals[$key]]);
      }
      return redirect()->route('category');
   }
}