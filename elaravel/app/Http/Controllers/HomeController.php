<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_products;
use App\manufacture;
use DB;

class HomeController extends Controller
{
    public function index()
    {
    	$published = tbl_products::join('tbl_category','tbl_products.category_id','tbl_category.category_id')
    		->join('tbl_manufacture','tbl_products.manufacture_id','tbl_manufacture.manufacture_id')
    		->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
    		->where('status',1)
    		->limit(15)
    		->get();
        $brands = manufacture::where('publication_status',1)
            ->take(8)
            ->get([
                'manufacture_id','manufacture_name'
            ]);
        $brandProducts = [];
        foreach($brands as $brand){
            $brandProducts[json_encode($brand)] = tbl_products::
                  where('manufacture_id',$brand->manufacture_id)
                ->where('status',1)
                ->orderBy('product_id','DESC')
                ->take(4)
                ->get();
        }
    	return view('slider',compact('published','brandProducts'));
    }

    public function productByCategory($category_id)
    {
    	$productByCategory = tbl_products::join('tbl_category','tbl_products.category_id','tbl_category.category_id')
    		->select('tbl_products.*','tbl_category.category_name')
    		->where('tbl_category.category_id',$category_id)
    		->where('tbl_products.status',1)
    		->limit(6)
    		->get();
    	return view('pages.productByCategory')->with('productByCategoreis',$productByCategory);
    }

    public function productByBrand($manufacture_id)
    {
    	
    	$productBymanufacture = tbl_products::join('tbl_category','tbl_products.category_id','tbl_category.category_id')
    		->join('tbl_manufacture','tbl_products.manufacture_id','tbl_manufacture.manufacture_id')
    		->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
    		->where('tbl_products.manufacture_id',$manufacture_id)
    		->where('status',1)
    		->limit(6)
    		->get();
    	return view('pages.productBymanufacture')->with('productBymanufactures',$productBymanufacture);
    }

    public function productDetails($id)
    {
    	$productinfos = tbl_products::join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
    		->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
    		->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
    		->where('tbl_products.product_id',$id)
    		->get();
    	return view('pages.productDetails')->with('productinfos',$productinfos);
    }
}
