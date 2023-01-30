<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_Product;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\OrderProductRequest;
use App\Models\Product;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     private $orderProduct;
     private $product;
     private $order;
 
     public function __construct(Order_Product $orderProduct, Product $product, Order $order)
     {
         $this->middleware(['permission:read-orderProducts'])->only('index', 'show');
         $this->middleware(['permission:create-orderProducts'])->only('create', 'store');
         $this->middleware(['permission:update-orderProducts'])->only('edit', 'update');
         $this->middleware(['permission:delete-orderProducts'])->only('destroy');
         $this->orderProduct = $orderProduct;
         $this->product = $product;
         $this->order = $order;
     }

    public function index(Request $request)
    {
        try {
            $products=$this->orderProduct->where('order_id',$request->input('order_id'))->get();
            $order_id=$request->input('order_id');
            return view('admin.order-products.index',compact('products','order_id'));

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __($e->getMessage())]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $order_id=$request->input('order_id');
            $products=$this->product->get();
            return view('admin.order-products.create',compact('products','order_id'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __($e->getMessage())]);
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderProductRequest $request)
    {
        try {
            $data = $request->all();
            $product=$this->product->findorfail($data['product_id']);
            if($data['count']>$product->stock)
            return redirect()->back()->with(['warning' => trans('general.warning_consumed_product')]);
            $product->update(['stock'=>$product->stock-$data['count']]);
            $data['product_name']=$product->title;
            $data['price']=$product->price;
            $data['product_total']=$product->price*$data['count'];
            $Order_Product = $this->orderProduct->create($data);
            $order_id=$data['order_id'];
            $order=$this->order->findOrfail($order_id);
            $order->update(['cart_total'=>$order->cart_total+$data['product_total']]);
            return $Order_Product ? redirect(route('order_products.index',['order_id'=>$order_id]))->with(['success' => trans('general.added_success')]) : redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __($e->getMessage())]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_Product  $order_Product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try {
            $data = $this->orderProduct->findorfail($id);
            return view('admin.order-products.show', compact('data'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __($e->getMessage())]);
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_Product  $order_Product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data = $this->orderProduct->findOrfail($id);
            if(!isset($data->product->id))
            return redirect()->back()->with(['warning' => trans('general.warning_deleted_product')]);
            $products=$this->product->get();
            return view('admin.order-products.edit', compact('data','products'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __($e->getMessage())]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order_Product  $order_Product
     * @return \Illuminate\Http\Response
     */
    public function update(OrderProductRequest $request, $id)
    {
        try {
            $data =  $request->all();
            $Order_Product = $this->orderProduct->findOrfail($id);
            $product=$this->product->findOrfail($data['product_id']);
            if($data['count'] > $product->stock+$Order_Product->count)
            return redirect()->back()->with(['warning' => trans('general.warning_deleted_product')]);
            $order=$this->order->findOrfail($Order_Product->order->id);
            $order->update(['cart_total'=>$order->cart_total-$Order_Product->product_total]);
            $product->update(['stock'=>$product->stock+$Order_Product->count-$data['count']]);
            $product_total=$data['count']*$product->price;
            $Order_Product ->update(['product_id'=>$data['product_id'],'count'=>$data['count'],'price'=>$product->price,'product_total'=> $product_total]);
            $Order_Product->fill($data)->save();
            $order->update(['cart_total'=>$order->cart_total+ $product_total]);
    
            return $Order_Product ? redirect(route('order_products.index',['order_id'=>$Order_Product->order->id]))->with(['success' => trans('general.updated_success')]) : redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __($e->getMessage())]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_Product  $order_Product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $Order_Product = $this->orderProduct->findOrfail($id);
            $Order_id=$Order_Product->order->id;
            if(isset($Order_Product->product->id)){
                $product=$this->product->findOrfail($Order_Product->product->id);
                $product->update(['stock'=>$product->stock-$Order_Product->count]);
                $order=$this->order->findOrfail($Order_Product->order->id);
                $order_total=$Order_Product->order->cart_total;
                $order_total=$order_total-$Order_Product->product_total;
                $order->update(['cart_total'=>$order_total]);
            }
            $Order_Product->delete();
            return redirect(route('order_products.index',['order_id'=>$Order_id]))->with(['success' => trans('general.deleted_success')]);

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __($e->getMessage())]);
        }
    }
}
