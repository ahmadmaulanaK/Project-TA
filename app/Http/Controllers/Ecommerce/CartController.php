<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Str;
use DB;
use App\Mail\CustomerRegisterMail;
use Mail;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer'
        ]);

        $carts = $this->getCarts();
        if ($carts && array_key_exists($request->product_id, $carts)) {

            $carts[$request->product_id]['qty'] += $request->qty;
        } else {
            $product = Product::find($request->product_id);
            $carts[$request->product_id] = [
                'qty' => $request->qty,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_image' => $product->image
            ];
        }
        $cookie = cookie('suji', json_encode($carts), 2880);
        return redirect()->back()->cookie($cookie)->with(['success' => 'product has been added, please make a transaction in the basket!']);
    }

    public function listCart()
    {

        $carts = $this->getCarts();

        $subtotal = collect($carts)->sum(function ($q) {
            return $q['qty'] * $q['product_price'];
        });
        return view('ecommerce.cart', compact('carts', 'subtotal'));
    }

    public function updateCart(Request $request)
    {
        $carts = $this->getCarts();
        foreach ($request->product_id as $key => $row) {
            if ($request->qty[$key] == 0) {
                unset($carts[$row]);
            } else {
                $carts[$row]['qty'] = $request->qty[$key];
            }
        }
        $cookie = cookie('suji', json_encode($carts), 2880);
        return redirect()->back()->cookie($cookie);
    }

    private function getCarts()
    {
        $carts = json_decode(request()->cookie('suji'), true);
        $carts = $carts != '' ? $carts : [];
        return $carts;
    }

    public function checkout()
    {

        $carts = $this->getCarts();
        $subtotal = collect($carts)->sum(function ($q) {
            return $q['qty'] * $q['product_price'];
        });
        return view('ecommerce.checkout', compact('carts', 'subtotal'));
    }

    public function processCheckout(Request $request)
    {

        $this->validate($request, [
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required',
            'email' => 'required|email',
            'customer_address' => 'required|string'
        ]);


        DB::beginTransaction();
        try {
            $customer = Customer::where('email', $request->email)->first();
            if (!auth()->guard('customer')->check() && $customer) {
                return redirect()->back()->with(['error' => 'Silahkan Login Terlebih Dahulu']);
            }
            $carts = $this->getCarts();
            $subtotal = collect($carts)->sum(function ($q) {
                return $q['qty'] * $q['product_price'];
            });
            if (!auth()->guard('customer')->check()) {
                $password = Str::random(8);
                $customer = Customer::create([
                    'name' => $request->customer_name,
                    'email' => $request->email,
                    'password' => $password,
                    'phone_number' => $request->customer_phone,
                    'address' => $request->customer_address,
                    'activate_token' => Str::random(30),
                    'status' => false
                ]);
            }
            $order = Order::create([
                'invoice' => Str::random(1) . '-' . time(),
                'customer_id' => $customer->id,
                'customer_name' => $customer->name,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'subtotal' => $subtotal
            ]);

            foreach ($carts as $row) {
                $product = Product::find($row['product_id']);
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $row['product_id'],
                    'price' => $row['product_price'],
                    'qty' => $row['qty']
                ]);
            }

            DB::commit();

            $carts = [];

            $cookie = cookie('suji', json_encode($carts), 2880);
            if (!auth()->guard('customer')->check()) {
                Mail::to($request->email)->send(new CustomerRegisterMail($customer, $password));
            }
            return redirect(route('front.finish_checkout', $order->invoice))->cookie($cookie);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function checkoutFinish($invoice)
    {
        $order = Order::where('invoice', $invoice)->first();
        return view('ecommerce.checkout_finish', compact('order'));
    }
}
