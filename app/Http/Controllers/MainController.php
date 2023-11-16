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
        $products = Product::paginate(6);
        return view('catalog', compact('products'));
    }
    public function basket() {
        return view('basket');
    }
}
