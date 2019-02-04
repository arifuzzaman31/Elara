<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\manufacture;
use DB;
use Session;

class brandController extends Controller
{
	public function addbrandpage()
	  {
	  	return view('admin.addbrand');
	  }

    public function allbrand()
    	{
    		$data = manufacture::get()->all();
    		return view('admin.allbrand')->with('manufacturies',$data);
    	} 

    public function addbrand(Request $req)
    	{
    		// $input = $req->all();
	    	$data = array();
	    	$data['manufacture_name']		  = $req->brand_name;
	    	$data['manufacture_description']  = $req->brand_description;
	    	$data['publication_status']	  	  = $req->publication_status;
	    	$data = DB::table('tbl_manufacture')->insert($data);

    		if ($data) {
    			Session::put('msg','A Brand name inserted successfully');
    			return redirect()->back();
    		}
    		
    	}
    public function unactive_manufacture($id)
      {
      		manufacture::where('manufacture_id',$id)
      					->update(['publication_status' => 0]);
      			return redirect()->back();
      }
    	
     public function active_manufacture($id)
      {
      		manufacture::where('manufacture_id',$id)
      					->update(['publication_status' => 1]);
      			return redirect()->back();
      }

     public function deleteManu($id)
     {
        $data = manufacture::where('manufacture_id',$id)
        ->delete();
        if ($data) {
             Session::put('msg','Brand deleted successfuly');
            return back();
        }
        
     }

    public function editManu($id)
     {
       
        $data = manufacture::where('manufacture_id',$id)->get();
        return view('admin.editBrand')->with('datas',$data);
     } 

    public function updateManu(Request $req,$id)
     {
       
        $data = manufacture::where('manufacture_id',$id)
        ->update([
                    'manufacture_name'        => $req->manufacture_name,
                    'manufacture_description' => $req->manufacture_description
                ]);
        if ($data) {
             Session::put('msg','Brand updated successfuly');
            return redirect::to('/all-brand');
        }
       
     }
}
