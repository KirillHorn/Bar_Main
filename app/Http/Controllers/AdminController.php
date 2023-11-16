<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\order;
use App\Models\products;
use App\Models\categories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //

 
   
    public function addproduct (Request $request) {
        $addproduct= $request->all();

        // $file = $request ->file("img");
        // $file_name = md5($file->getClientOriginalName().time()). "." .$file->getClientOriginalExtension();
        // Storage::putFileAs("public/img",$file,$file_name);

        
        $file_name = $request->file('img')->hashName();
        $path = $request->file('img')->store('/public/img');

     $product=products::create([
            "title"  => $addproduct["title"],
            "description" =>$addproduct["description"],
            "cost" =>$addproduct["cost"],
            "img"=>$file_name,
            "categoru_id"=>$addproduct["categoru_id"]
        ]);
        if ($product) {
            return redirect("/admin/serviceRedact")->with("success","");
        }

    }

    public function edit($id)
    {
        $categoria= categories::all();
        $product_id= products::find($id); 
        return view('admin.Edit',["product_id" => $product_id, "categories" => $categoria]);
    }
    public function update (Request $request, products $id)  {
    //    $update_product= $request->all(); ;

    //    $file_name = $request->file('img')->hashName();
    //    $path = $request->file('img')->store('/public/img');

    //     $id=products::find($id)->fill ([
    //         "title"  => $update_product["title"],
    //         "description" =>$update_product["description"],
    //         "cost" =>$update_product["cost"],
    //         "img"=>$file_name,
    //         "categoru_id"=>$update_product["categoru_id"]
    //     ]);
    //     if ($id) {
    //         return redirect("/admin/Edit")->with("success","");
    //     } else {
    //         return redirect("/admin/Edit")->with("success","Произошла ошибка");
    //     }

    
       $file_name = $request->file('img')->hashName();
       $path = $request->file('img')->store('/public/img');
    $id->fill(['title' => $request->title, 'description' => $request->description, 'cost' => $request->cost, 'img' => $file_name, 'categoru_id' => $request->categoru_id]);
    $id->save();
    return redirect("/admin/serviceEdit")->with("success","вффвфвфв");;
      
    }
    public function destroy(products $id)
    {
        $id->delete();
        return redirect("/admin/serviceEdit")->with("success","");
    }


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
    public function serviceRedact(){

        $categoria= categories::all();
        $product_info= products::all();  
    return view('admin.serviceRedact',["categories" => $categoria , "product_info" => $product_info]);
}
public function serviceEdit(){
    $categoria= categories::all();
    $product_info= products::all();  
    
return view('admin.serviceEdit',["categories" => $categoria , "product_info" => $product_info]);
}
      
}
