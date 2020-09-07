<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Brand;
use App\Subcategory;
use App\Category;
class PageController extends Controller
{
     public function home($value='')
    {
       // $route=Route::current();
        //dd($route);
        $items=Item::all()->take(6);
        $brands=Brand::all();
        //dd($items);
        return view ('frontend.home',compact('items','brands'));

    }

     public function brandfun($id)
    {
        $brand =Brand::find($id);
        return view ('frontend.brand',compact('brand')) ;
        
    }

     public function itemdetailfun($id)
    {   

        $itemdetail=Item::find($id);
       $brand_id=$itemdetail->brand_id;
       $subcategory_id=$itemdetail->subcategory_id;
       $relate_items=Item::where(['brand_id'=>$brand_id,'subcategory_id'=>$subcategory_id])->get();
        return view ('frontend.itemdetail',compact('itemdetail','relate_items')) ;
        
    }

     public function loginfun($value='')
    {        return view ('frontend.login') ;
        
    }

     public function promotionfun($value='')
    {
         $items = Item::where('discount' ,'>', 0)->get();
        return view ('frontend.promotion',compact('items')) ;
        
    }

     public function registerfun($value='')
    {
        return view ('frontend.register') ;
        
    }

     public function shoppingcartfun($value='')
    {
        return view ('frontend.shoppingcart') ;
        
    }

     public function subcategoryfun($id)
    {
       $item_subcategories = Subcategory::find($id);
    $categories = Category::all();
    return view('frontend.subcategory',compact('item_subcategories','categories'));
  }
        
    
    
    public function filterwithcategory(Request $request)
  {
    $category = Category::find($request->id);
    // $category = DB::table('items')
    //           ->join('subcategories',)
    $items = array();
    foreach ($category->subcategories as $value) {
      $items = $value->items;
    }
    // dd($items)
    return $category;
  }

  
}
