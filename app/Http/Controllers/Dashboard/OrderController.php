<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_Product;
use App\Http\Requests\Dashboard\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    private $order;
    private $orderProduct;

    public function __construct(Order $order, Order_Product $orderProduct)
    {
        $this->middleware(['permission:read-orders'])->only('index', 'show');
        $this->middleware(['permission:create-orders'])->only('create', 'store');
        $this->middleware(['permission:update-orders'])->only('edit', 'update');
        $this->middleware(['permission:delete-orders'])->only('destroy');
        $this->order = $order;
        $this->orderProduct = $orderProduct;
    }
    
    public function index()
    {
        try {
            $orders = $this->order::OrderBy('created_at','DESC')->paginate(20);
            return view('admin.Order.index', compact('orders'));
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
    public function store(Request $request)
    {
          
    }

    
    public function show($id)
    {
        try {
            $order = $this->order->findOrfail($id);
            $products= $this->orderProduct->where('order_id',$order->id)->get();
            return view('admin.Order.show', compact('order','products'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __($e->getMessage())]);
        }
    }


    public function edit($id)
    {
        try {
            $order = $this->order->findOrfail($id);
            $products=$this->orderProduct->where('order_id',$order->id)->get();
            return view('admin.Order.edit', compact('order','products'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __($e->getMessage())]);
        }
    }

    

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        
        try {
            $data =  $request->all();
    
            $order = $this->order->findOrfail($id);
            $order->fill($data)->save();
            return $order ? redirect(route('orders.index', $id))->with(['success' => trans('general.updated_success')]) : redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __($e->getMessage())]);
        }
    }

    public function destroy($id)
    {  
        try {
            $Order = $this->order->findOrfail($id);
            $Order->delete();
            return redirect(route('orders.index'))->with(['success' => trans('general.deleted_success')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __($e->getMessage())]);
        }
    }

}
