<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Str;
use File;

class ProductController extends Controller
{
    public function index()
    {

        $product = Product::with(['category'])->orderBy('created_at', 'DESC');
        if (request()->q != '') {
            $product = $product->where('name', 'LIKE', '%' . request()->q . '%');
        }
        $product = $product->paginate(10);
        return view('products.index', compact('product'));
    }

    public function create()
    {
        $category = Category::orderBy('name', 'DESC')->get();
        return view('products.create', compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ]);


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/products', $filename);
            $product = Product::create([
                'name' => $request->name,
                'slug' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'image' => $filename,
                'price' => $request->price,
                'status' => $request->status
            ]);
            return redirect(route('product.index'))->with(['success' => 'Produk Baru Ditambahkan']);
        }
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        File::delete(storage_path('app/public/products/' . $product->image));
        $product->delete();
        return redirect(route('product.index'))->with(['success' => 'Produk Sudah Dihapus']);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::orderBy('name', 'DESC')->get();
        return view('products.edit', compact('product', 'category'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:png,jpeg,jpg'
        ]);

        $product = Product::find($id);
        $filename = $product->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/products', $filename);
            File::delete(storage_path('app/public/products/' . $product->image));
        }


        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'image' => $filename
        ]);
        return redirect(route('product.index'))->with(['success' => 'Data Produk Diperbaharui']);
    }
}
