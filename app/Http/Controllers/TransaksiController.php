<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class TransaksiController extends Controller
{
    public function index()
    {
        $products = Product::with(['category'])->orderBy('created_at', 'DESC')->get();

        return view('transaksi.index', compact('products'));
    }
    public function getProduct($id)
    {
        $products = Product::findOrFail($id);
        return response()->json($products, 200);
    }
}
