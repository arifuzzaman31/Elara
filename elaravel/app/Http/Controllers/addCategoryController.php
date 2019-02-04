<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\categoryMode;
use Session;

class addCategoryController extends Controller
{
    public function index()
    {
    	return view('admin.addcategory');
    }
    public function allcategory()
    {
    	$datas = categoryMode::all();
    	return view('admin.allcategory')->with('categories',$datas);
    }

    public function save_category(Request $req)
    {
    	$data = array();
    	$data['category_name']		  = $req->category_name;
    	$data['category_description'] = $req->category_description;
    	$data['publication_status']	  = $req->publication_status;
    	DB::table('tbl_category')->insert($data);
    	if ($data) {
    		Session::put('msg','Category added successfuly');
            //return redirect::to('/add-category');
	    	return redirect()->back();
    	}
	     
    }

    public function active_category($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update(['publication_status' => 1]);

        Session::put('msg','Category deactiveted');
        return redirect::to('/all-category');
    } 

    public function unactive_category($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update(['publication_status' => 0]);

        Session::put('msg','Category activeted successfuly');
        return redirect::to('/all-category');
    }

    public function deleteCat($category_id)
     {
        $data = categoryMode::where('category_id',$category_id)
        ->delete();
        if ($data) {
             Session::put('msg','Category deleted successfuly');
             return redirect::to('/all-category');
        }
        else {
            return redirect::to()->back();
        }
        
     }

    public function editCat($category_id)
     {
       
        $data = categoryMode::where('category_id',$category_id)->get();
        return view('admin.editpage')->with('datas',$data);
     } 

    public function updateCat(Request $req,$category_id)
     {
       
        $data = categoryMode::where('category_id',$category_id)
        ->update([
                    'category_name'        => $req->category_name,
                    'category_description' => $req->category_description
                ]);
        if ($data) {
             Session::put('msg','Category updated successfuly');
             return redirect::to('/all-category');
        }
        else {
            return redirect::to()->back();
        }
       
     }
}
