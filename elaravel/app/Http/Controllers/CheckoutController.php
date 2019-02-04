<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;
use App\Customer;
use App\Shipping;
use App\Payment;
use App\Order;
use App\OrderDetails;

class CheckoutController extends Controller
{
    public function CheckoutLogin()
    {
    	return view('pages.login');
    }
    public function customerRegistration(Request $request)
    {
    	
    	$data  = array();
    	$data['customer_name']		 = $request->customer_name;
    	$data['customer_email']		 = $request->customer_email;
    	$data['customer_passwrod']   = $request->customer_password;
    	$data['phone']				 = $request->phone;

    	$customer_id = Customer::insertGetId($data);
    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name',$request->customer_name);
    	return redirect('checkout');
    }

    public function checkout()
    {
    	return view('pages.checkout');
    }     

    public function saveShippingInfo(Request $request)
    {
    	
    	$data = array();

    	$data['shipping_email']		 = $request->shipping_email;
    	$data['shipping_first_name'] = $request->shipping_first_name;
    	$data['shipping_last_name']  = $request->shipping_last_name;
    	$data['shipping_address']	 = $request->shipping_address;
    	$data['shipping_phone']		 = $request->shipping_phone;
    	$data['shipping_city']		 = $request->shipping_city;
 
    	$shipping_id = Shipping::insertGetId($data);
    	Session::put('shipping_id',$shipping_id);
    	return Redirect::to('payment');
    }

    public function payment()
    {
    	
    	return view('pages.payment');
    }     
    public function holdingPlace(Request $request)
    {
    	
    	$payment_gatway = $request->payment_gatway;
    	$pdata = array();
    	$pdata['payment_method'] = $payment_gatway;
    	$pdata['payment_status'] = 0;
    	$payment_id = Payment::insertGetId($pdata);

    	$odata = array();
    	$odata['customer_id'] = Session::get('customer_id');
    	$odata['shipping_id'] = Session::get('shipping_id');
    	$odata['payment_id']  = $payment_id;
    	$odata['order_total'] = Cart::total();
    	$odata['order_status']= 0;
    	$order_id = Order::insertGetId($odata);

    	$contents = Cart::content();
    	$oddata = array();
    	foreach ($contents as $content)
    	{	
			$oddata['order_id']				 = $order_id;
			$oddata['product_id']			 = $content->id;
			$oddata['product_name']			 = $content->name;
			$oddata['product_price']		 = $content->price;
			$oddata['product_sales_quantity']= $content->qty;
		OrderDetails::insert($oddata);
    	}
    	Cart::destroy();
    	return view('pages.greeting')->with('wish',$payment_gatway);
    }

    public function customerLogout()
    {
    		Cart::destroy();
			Session::forget('customer_id');
			return redirect('checkout-login');
    } 
    public function customerLogin(Request $request)
    {
    	$custumer_email = $request->customer_email;
    	$password 		= $request->customer_password;
    	
    	$result = Customer::where('customer_email',$custumer_email)
    			->where('customer_passwrod',$password)
    			->first();
    		if ($result) {

				Session::put('customer_id',$result->customer_id);
				Session::put('customer_name',$result->customer_name);
				return redirect('checkout');
    		}
    		return redirect('checkout-login');
    } 

}
