<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $products = Product::paginate(3);
        return view('index', compact('products'));
    } 
    public function product($prod) {
        $prod = Product::find($prod);
        return view('product',["prod" => $prod]);
  }
    public function catalog() {
        return view('catalog');
    }
    public function basket() {
        return view('basket');
    }
}
