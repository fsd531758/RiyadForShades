<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Order_product;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function order_post(OrderRequest $request){
        $cart_total=0;
        $data=$request->except('_token','quantity','products');
        $products=$request->products;
        $quantities=$request->quantity;

        for($i=0; $i<count($products); $i++){
           $product=Product::findorfail($products[$i]);
           $cart_total+=($product->price*$quantities[$i]);
        }

        $data['cart_total']=$cart_total;
        $order=Order::create($data);

        for($i=0; $i<count($products); $i++){
            $product=Product::findorfail($products[$i]);
            Order_product::create(["order_id"=>$order->id,"product_id"=>$products[$i],"product_name"=>$product->title,"count"=>$quantities[$i],"price"=>$product->price,"product_total"=>$quantities[$i]*$product->price]);  
            
            $product->update(["stock"=>$product->stock - $quantities[$i]]);
        }


         return redirect()->back()->with(['success' => __('تم ارسال الطلب')]);

    }
}
