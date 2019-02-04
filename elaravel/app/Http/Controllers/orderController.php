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

class orderController extends Controller
{
    public function orderManage()
    {
    $order_manage = Order::join('Customers','orders.customer_id','Customers.customer_id')
    			->select('orders.*','Customers.customer_name')
    			->get();
    	return view('admin.OrderManage')->with('AllOrderManage', $order_manage);
    }

    public function unactiveOrder($orderId)
    {
    	Order::where('order_id',$orderId)
    		  ->update([
    		  		'order_status' => 0
    		  ]);
    	return Redirect()->back();
    }

    public function activeOrder($orderId)
    {
    	Order::where('order_id',$orderId)
    		  ->update([
    		  		'order_status' => 1
    		  ]);
    	return Redirect()->back();
    }

    public function deleteOrder($orderId)
    {
        Order::where('order_id',$orderId)
              ->delete();
        return Redirect()->back();
    }   

    public function viewOrder($orderId)
    {
   $viewInfo=Order::join('customers','orders.customer_id','=','customers.customer_id')
             ->join('order_details','orders.order_id','=','order_details.order_id')
             ->join('shipping','orders.shipping_id','=','shipping.shipping_id')
             ->where('orders.order_id',$orderId)
             ->first();
    return view('admin.viewOrderinfo')->with('viewInfos',$viewInfo);

    }
}
