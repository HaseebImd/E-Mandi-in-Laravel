<?php

namespace App\Http\Controllers;
use App\Models\customer;
use App\Models\product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class Product_Controller extends Controller
{
    function home(Request $req) 
    {
        
        
        if($req->session()->has('user'))
        {
        $userID=Session::get('user')['id'];
        $user= customer::where('id',$userID)->get();
        $data= Product::all()->take(6)->sortByDesc("id");
        return view('home', ['products'=>$data,'user'=>$user]);
        }
        else
        {
            return redirect('/login');
        }
        
        
    }
    function addproduct()
    {
        return view('addproduct');
    }
    function saveproduct(Request $request)
    {
        $product=new product();
        $product->name=$request->input('name');
        $product->code=$request->input('code');
        $product->color=$request->input('color');
        $product->weight=$request->input('weight');
        $product->age=$request->input('age');
        $product->base_bid=$request->input('base_bid');
        $product->base_price=$request->input('base_price');
        $product->origin=$request->input('origin');
        $product->status=$request->input('status');
        
        
        $image=$request->input('image');
        $imageName = time().'.'.$request->image->extension(); 
        $product->image=$imageName;
        $request->image->move(public_path('assets/uploads/stock'), $imageName);
        
        $product->save();
        return redirect('/addproduct');
    }

    function detailpage(Request $request)
    {
        $id = $request->id;

        $data= Product::where('id',$id)->get();
        return view('detailpage',['products'=>$data]);
    }

    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
           $cart= new Cart;
           $cart->user_id=$req->session()->get('user')['id'];
           $cart->product_id=$req->product_id;
           $cart->save();
           return redirect('/');

        }
        else
        {
            return redirect('/login');
        }
    }
    static function cartItem()
    {
     $userId=session::get('user')['id'];
     return Cart::where('user_id',$userId)->count();
    }

    function cartList()
    {
       $userId=Session::get('user')['id'];
       $products= DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$userId)
        ->select('products.*','carts.id as cart_id')
        ->get();

        return view('cart',['products'=>$products]);
    }
     function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cart');
    }
    
    function checkout()
    {
        $userId=Session::get('user')['id'];
        $total= $products= DB::table('carts')
         ->join('products','carts.product_id','=','products.id')
         ->where('carts.user_id',$userId)
         ->sum('products.base_price');
         $userId=Session::get('user')['id'];
         $cart_products= DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$userId)
        ->select('products.*','carts.id as cart_id')
        ->get();

         return view('checkout', ['products'=>$cart_products,'total'=>$total]);
         
    }

    function orderPlace(Request $req)
    {
        $userId=Session::get('user')['id'];
         $allCart= Cart::where('user_id',$userId)->get();
         foreach($allCart as $cart)
         {
             $order= new Order;
             $order->product_id=$cart['product_id'];
             $order->user_id=$cart['user_id'];
             $order->status="Pending";
             $order->payment_method="Cash on Delivery";
             $order->payment_status="Pending";
             $order->address=$req->input('address');
             $order->save();
             Cart::where('user_id',$userId)->delete();
         }
         $req->input();
         return redirect('/');
    }

    function products()
    {
         $data= product::all()->sortByDesc("id");
        return view('products', ['products'=>$data]);
    }

    function search(Request $req)
    {
        $data= Product::
        where('name', 'like', '%'.$req->input('query').'%')
        ->get();
        return view('search',['products'=>$data]);
    }


   
}
