<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function Products(){
        $products = Product::paginate(6);
        return view('catalog', compact('products'));
    }
}