<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Image;
use App\Models\customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
     function login() 
    {
        return view('login');
    }
    function signup() 
    {
        return view('signup');
    }
    function create_account(Request $request)
    {
        $customer = new customer();
        $customer->name=$request->input('name');
        $customer->username=$request->input('username');
        $customer->email=$request->input('email');
        $customer->password=$request->input('password');
        $customer->contact=$request->input('contact');
        $customer->city=$request->input('city');
        $customer->address=$request->input('address');
        $customer->type="user";
        $customer->gender=$request->input('gender');
        $customer->cnic=$request->input('cnic');
        $user_username= customer::where(['username'=>$request->input('username')])->first();
        $user_cnic= customer::where(['cnic'=>$request->input('cnic')])->first();
            
        if($user_username)
        {
            $data ="Username is already taken";
            return redirect('/signup')->with('message', 'Username is already taken');
            
        }
        else if($user_cnic)
        {
             return redirect('/signup')->with('message', 'CNIC is already taken');
           
        }
        else
        {

        
        $image=$request->input('image');
        $imageName = time().'.'.$request->image->extension(); 
        $customer->image=$imageName;
        $request->image->move(public_path('assets/uploads/users'), $imageName);
        
        $customer->save();
        $user= customer::where(['email'=>$request->email])->first();
        $request->Session()->put('user',$user);
        return redirect('/')->with('message', 'Your Account is created Successfully');
        }
    }
    function user_login(Request $request)
    {
        $user= Customer::where(['username'=>$request->username,'password'=>$request->password])->first();
        if($user)
        {
            $request->Session()->put('user',$user);
            return redirect('/');
        }
        else
        {
            return redirect('/login')->with('message', 'Invalid Credentials');;;
        }
        

    }

    function Orders()
    {
        $userId=Session::get('user')['id'];
        $orders= DB::table('orders')
         ->join('products','orders.product_id','=','products.id')
         ->where('orders.user_id',$userId)
         ->get();

         return view('orders',['orders'=>$orders]);
    }

    function edituser(Request $request)
    {
        $id = $request->id;
        $data= customer::where('id',$id)->get();
        return view('edituser',['users'=>$data]);
    }

       function save_edituser(Request $request)
    {
        $user=new customer();
        $name=$request->input('name');
        $email=$request->input('email');
        $contact=$request->input('contact');
        $password=$request->input('password');
        $city=$request->input('city');
        $address=$request->input('address');
        $username=$request->input('username');
        $gender=$request->input('gender');
        $image=$request->input('image');
        $imageName = time().'.'.$request->image->extension(); 
        $user->image=$imageName;
        $request->image->move(public_path('assets/uploads/users'), $imageName);

        DB::update('update customers set name = ?,email=?, contact=?, password=?,city=?,address=?,image=?,gender=?  where username = ?',[$name,$email,$contact,$password,$city,$address,$imageName,$gender,$username]);
        
        $user= Customer::where(['username'=>$request->input('username'),'password'=>$request->input('password')])->first();
        
        $request->Session()->put('user',$user);
        return redirect('/');
        
    }

    
}
