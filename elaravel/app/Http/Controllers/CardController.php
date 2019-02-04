<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\tbl_products;
use App\categoryMode;
use Cart;

class CardController extends Controller
{
    public function addToCard(Request $request)
    {
    	 $addToCard = tbl_products::where('tbl_products.product_id',$request->product_id)->first();
    	
    	$data['qty']   = $request->qty;
    	$data['id']    = $addToCard->product_id;
    	$data['name']  = $addToCard->product_name;
    	$data['price'] = $addToCard->product_price;
    	$data['options']['image'] = $addToCard->product_image;

    	Cart::add($data);
    	return Redirect::to('show-cart');
    }

    public function showCart()
    {
    	$all_published_category = categoryMode::where('publication_status',1)->get();
    	return view('pages.addToCard')->with('published_category',$all_published_category);
    } 

    public function deleteToCart($rowId)
    {
    	//Cart::update($rowId,0);
    	Cart::remove($rowId);
    	return Redirect::to('show-cart');
    }    

    public function updateCart(Request $request)
    {
    	Cart::update($request->rowId,$request->qty);
    	return Redirect::to('show-cart');
    }
}
