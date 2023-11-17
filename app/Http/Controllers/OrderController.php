<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\order;
use App\Models\products;
use App\Models\categories;

class OrderController extends Controller
{
        public function ordersDeny(){
        $orders = DB::table('orders')->join('baskets', 'orders.basket_id', '=', 'baskets.id')->join('products', 'baskets.product_id', '=', 'products.id')->join('users', 'baskets.user_id', '=', 'users.id')->join('payments', 'orders.id_type', '=', 'payments.id')->join('status', 'orders.id_status', '=', 'status.id')->where('id_status', 3)->paginate(10);
        return view('admin.ordersDeny', compact('orders'));
    }
    public function orderDeny(order $id_status){
        $orde = order::find($id_status);
        $flights = order::find($id_status)
               ->get();

        dd($flights);
        $order = DB::table('orders')->where('id',$id_stat)->update(['id_status'=>2]);



                $orders = DB::table('orders')->join('baskets', 'orders.basket_id', '=', 'baskets.id')->join('products', 'baskets.product_id', '=', 'products.id')->join('users', 'baskets.user_id', '=', 'users.id')->join('payments', 'orders.id_type', '=', 'payments.id')->join('status', 'orders.id_status', '=', 'status.id')->where('id_status', 3)->paginate(10);
        return view('admin.ordersDeny', compact('orders'));
}
        public function ordersNew(){
            $orders = DB::table('orders')->join('baskets', 'orders.basket_id', '=', 'baskets.id')->join('products', 'baskets.product_id', '=', 'products.id')->join('users', 'baskets.user_id', '=', 'users.id')->join('payments', 'orders.id_type', '=', 'payments.id')->join('status', 'orders.id_status', '=', 'status.id')->where('id_status', 1)->paginate(10);
            return view('admin.ordersNew', compact('orders'));
    }

    public function ordersSub(){
        $orders = DB::table('orders')->join('baskets', 'orders.basket_id', '=', 'baskets.id')->join('products', 'baskets.product_id', '=', 'products.id')->join('users', 'baskets.user_id', '=', 'users.id')->join('payments', 'orders.id_type', '=', 'payments.id')->join('status', 'orders.id_status', '=', 'status.id')->where('id_status', 2)->paginate(10);
        return view('admin.ordersSub', compact('orders'));
}
}