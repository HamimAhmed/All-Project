<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function ShowCart()
    {
        $data['sidbar'] = false;
        $data['cart'] = session()->has('cart') ? session('cart') : [];
        $data['total'] = array_sum(array_column($data['cart'],'total_price'));

        return view('frontened.cart',$data);
    }


    public function addToCart(Request $request)
    {

        $request->validate([
            'product_id' =>'required',
        ]);

        $cart =session()->has('cart') ? session('cart') : [];

      $product= Product::findOrFail($request->input('product_id'));
      $key = (string)$product->id;

        if(array_key_exists($key,$cart))
        {
            $cart[$key]['quantity']++;
            $cart[$key]['total_price'] = $cart[$key]['quantity'] * $product->price;
        }else
            {
            $cart[$key] =[
                'name' => $product->name,
                'quantity' => 1,
                'price'  => $product->price,
                'total_price' => $product->price,
            ];


          }
          session([ 'cart' => $cart]);

        session()->flash('type','success');
        session()->flash('message','product added to the cart');
        return redirect()->route('cart');

    }


    public function deleteFromToCart(Request $request)
    {
       $request->validate([
           'product_id' =>'required',
       ]);

        $cart =session()->has('cart') ? session('cart') : [];
        $key = (string) $request->input('product_id');

        unset($cart[$key]);
        session(['cart' =>$cart]);

        session()->flash('type','danger');
        session()->flash('message','product removed from the cart');
        return redirect()->route('cart');

    }

public function  removeFromToCart(Request $request)
{
    $request->validate([
        'product_id' =>'required',
    ]);

    $cart =session()->has('cart') ? session('cart') : [];

    $product= Product::findOrFail($request->input('product_id'));
    $key = (string) $product->id;


    if(array_key_exists($key, $cart))
    {
      if( $cart[$key]['quantity'] == 1)
      {
         unset($cart[$key]) ;
      } else
          {
              $cart[$key]['quantity']--;
              $cart[$key]['total_price'] = $cart[$key]['quantity'] * $product->price;
      }


    }

    session(['cart' => $cart]);
    session()->flash('type','danger');
    session()->flash('message','product Cancelled from the cart');
    return redirect()->route('cart');


     }



     public function clearCart(){

        session()->forget(['cart']);

         session()->flash('type','danger');
         session()->flash('message','Cart has been cleared');
         return redirect()->route('cart');

     }

     public  function showCheckout(){

        $data = [];
        $data['sidbar'] = false;
        $data['cart'] = session()->has('cart') ? session('cart') : [];
        $data['total'] = array_sum(array_column($data['cart'],'total_price'));
        return view('frontened.checkout',$data);
     }


     public function processCheckout(Request $request)
     {
         $cart = session()->has('cart') ? session('cart') : [];
         $total= array_sum(array_column($cart,'total_price'));

        if(empty($cart)){
            return redirect('/');
        }

        $request->validate([

            'customer_name' => 'required',
            'customer_address' => 'required',
            'customer_contact_no' => 'required',

        ]);

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'customer_name' => $request->input('customer_name'),
            'customer_address' => $request->input('customer_address'),
            'customer_contact_no' => $request->input('customer_contact_no'),
            'total_amount' => $total,
        ]);

        foreach ($cart as $product_id => $product)
        $order->products()->create([
            'product_id' => $product_id,
            'quantity' => $product['quantity'],
            'unit_price' => $product['price'],
        ]);

        session()->forget('cart');

        session()->flash('type','success');
        session()->flash('message','Your Order On Under Processing plz stay with us');
        return redirect()->route('cart');

     }
}
