<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_product;

class OrderController extends Controller
{
    public function order_post(Request $request){
        $data=$request->all();
        $order=Order::create($data['user']);
        $products=$data['products'];
        foreach($products as $product){
           $order_product=Order_product::create($product);
        }
    }
}
