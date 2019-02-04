<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\tbl_products;
use Session;

class productController extends Controller
{
   public function index()
   {
        return view('admin.add_product');
    }

   public function allProduct()
    {
    	$productdata = tbl_products::join('tbl_category','tbl_products.category_id','=',
            'tbl_category.category_id')
    		->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
    		->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
    		->get();
    	return view('admin.all_product')->with('products',$productdata);
    }

   public function save_product(Request $request)
    {
    	$productdata = new tbl_products;
    	$productdata->product_name	  		    = $request->product_name;
    	$productdata->category_id			    = $request->category_id;
    	$productdata->manufacture_id 		    = $request->manufacture_id;
    	$productdata->product_short_description = $request->product_short_desc;
    	$productdata->product_long_description  = $request->product_long_desc;
    	$productdata->product_price	   		    = $request->product_price;
    	$productdata->product_size			    = $request->product_size;
    	$productdata->product_color 			= $request->product_color;
    	$productdata->status					= $request->publication_status;

    	if ($request->hasFile('image')) {
	    	$file 	  = $request->file('image');
	     	$extension= $file->getClientOriginalExtension();
	     	$fileName = time().'.'.$extension;
    		$file->move('upload/images',$fileName);
    		$productdata->product_image			= $fileName;
    	}
    	if ($productdata->save()) {
    		Session::put('msg','Data & file uploaded successfully');
    	 //return redirect::to('/add-product');
         return redirect()->back();	
    	}
    	
    }

    public function inactive_product($id)
    {
    	 tbl_products::where('product_id',$id)->update(['status' => 0]);
    	 return redirect()->back();
    }

    public function active_product($id)
    {
    	 tbl_products::where('product_id',$id)->update(['status' => 1]);
    	 return redirect()->back();
    }

    public function edit_product($prod_id)
    {
     	$productdata = tbl_products::where('product_id',$prod_id)->get();
    	return view('admin.edit_product')->with('products',$productdata);
    }

    public function update_product(Request $req, $prod_id)
    {
     	if ($req->hasFile('image'))
	    	$file 	  = $req->file('image');
	     	$extension= $file->getClientOriginalExtension();
	     	$fileName = time().'.'.$extension;
    		$file->move('upload/images',$fileName);

     	$data = tbl_products::where('product_id',$prod_id)->update([
		    	'product_name'	  		    => $req->product_name,
		    	'category_id'			    => $req->category_id,
		    	'manufacture_id' 		    => $req->manufacture_id,
		    	'product_short_description' => $req->product_short_desc,
		    	'product_long_description'  => $req->product_long_desc,
		    	'product_price'	   		    => $req->product_price,
    			'product_image'				=> $fileName,
		    	'product_size'			    => $req->product_size,
		    	'product_color' 			=> $req->product_color,
		    	'status'					=> $req->publication_status
		     	]);

    	if ($data)
        {
    		Session::put('msg','Data & file updated successfully');
    	    return redirect::to('/all-product');	
    	}
    }

    public function delete_product($prod_id)
    {
    	tbl_products::where('product_id',$prod_id)->delete();
             //Session::put('msg','product deleted successfuly');
             return redirect::to('/all-product');
    }
}
