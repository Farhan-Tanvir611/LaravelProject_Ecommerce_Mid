<?php

namespace App\Http\Controllers\Customer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UMSCustomer;
use App\Models\UMSProducts;
use App\Models\UMSCart;
use App\Models\UMSOrders;
use App\Models\UMSConfirm_order;

use session;
class Customercontroller extends Controller
{
    //
    function signup(){

        return view("Customer.signup");
    }

    function signupvalidate(Request $req){
        $this->validate($req,
            [
                "name"=>"required",
                "id"=>"required|unique:customers,c_id|integer",
                "email"=>"required|unique:customers,c_id",
                "phone"=>"required",
                "address"=>"required",
                'password' => 'required',
                "conf_password"=>"required|same:password",
            ],
            [
                "name.required"=>"Please provide your name",
                "id.exists"=>"This id is already taken",
                //"id.regex"=>"Id must be in integer",
                //"name.regex"=>"Only alphabetic",
                //"password.regex"=>"Password minimum 8 characters, contains a uppercase, a lowercase, a number & a special character"
            ]);
            $customer = new UMSCustomer();
            $customer->c_name = $req->name;
            $customer->c_id =$req->id;
            $customer->c_email =$req->email;
            $customer->c_phone =$req->phone;
            $customer->c_address =$req->address;
            $customer->c_password = $req->password;
            $customer->save();
            //session()->flash('msg','successfull');
            //return back();
            return redirect()->route("loginpage");
 
    }

    function login(){
        $user = UMSCustomer::where('C_id',session()->get('logged'))->first();
        if($user){
            session()->put('logged',$user->C_id);
                return redirect()->route('dashboard');
       
        }
        else
         {
            return view("Customer.login");
         }
    }

    function loginSubmit(Request $req){
        $this->validate($req,
            [
             
                "id"=>"required|exists:customers,c_id",
                'password' => 'required|exists:customers,c_password',
                
            ],
            [
                "id.required"=>"Please provide your id",
                //"nasme.regex"=>"Only alphabetic",
                //"password.regex"=>"Password minimum 8 characters, contains a uppercase, a lowercase, a number & a special character"
            ]);
            $user =UMSCustomer::where('C_id',$req->id)
            ->where('c_password',$req->password)->first();

            if($user){
                //session()->flash('msg','User Exists');
                session()->put('logged',$user->C_id);
                return redirect()->route('dashboard');
            //return "<h1>okay</h1>";
        }
            else {
              session()->flash('msg','User not valid');
            return back();
            } 
    }
    function dashboard(){
        $product = UMSProducts::paginate(4);
        $user = UMSCustomer::where('C_id',session()->get('logged'))->first();
        return view('Customer.dashboard')->with('user',$user)
                                          ->with('product',$product);

        //$product = UMSProducts::all();
       // return view('Product.plist',['product'=>$product]);
    }
    /*
    function addtocart(Request $req){
        if($req->session()->get('logged'))  
        {
            $order = new UMSOrders();
            $order->Item_name = $req->p_name;
            //$order->Shipping_place =$req->p_id;
            //$order->Payment_type =$req->p_price;
            $order->Price =$req->p_price;
            $order->C_id =$req->c_id;
            $order->P_id =$req->p_id;
           // $order->S_id =$req->phone;
           $order->save();
           return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('loginpage');
        }
    }*/
    function addtocart(Request $req){
        $user=session()->get('logged');
        if($req->session()->get('logged'))  
        {
          $cart_table = new UMSCart();
          $cart_table->P_id =$req->p_id;
          $cart_table->C_id =$user;
          $cart_table->save();
          return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('loginpage');
        }

    }



    function cartitem(){
        $users = UMSCustomer::where('C_id',session()->get('logged'))->first();
        $user=session()->get('logged');
       
if(session()->get('logged')){
    $carts=DB::table('cart')
  ->join('products','cart.P_id','=','products.P_id')
  ->where('cart.C_id',$user)
  ->select('products.*','cart.Cart_id as Cart_id')
  ->get();
  return view('Customer.cart')->with('carts',$carts)
                               ->with ('user',$users);
    }
    else{
        return redirect()->route('loginpage');
    }
}
 /*$customer=UMSCustomer::where('C_id',$user)->first();
           // $orders=UMSCustomer::with('orders')->get(); 
          // $department=UMSCustomer::with('customercart')->first();
           $departments=UMSProducts::with('productcart')->first();
           return $departments
           ->with($customer->customercart);
*/ 

    /*function cartitem(){
        //$user=session()->get('logged');
       // $user=102;
       //$pid=1260;
       
        //$customer=UMSCustomer::where('C_id',$user)->first();
        //$order=UMSOrders::where('C_id',$user)->first();
        //$pids=UMSOrders::where('P_id',$pid)->first();
        //$product=UMSProducts::where('P_id',$user)->first();

       // return $customer->orders->$order;
        //$department=UMSDepartment::with('studentss')->get(); 
       // $product = UMSProducts::all();
        //$carts= UMSOrders::where('C_id',$user_id)->count();
        //return view('Customer.cart')->with('carts',$customer->orders);
          //                          ->with('user',$user)
            //                        ->with('product',$product);
            $user=session()->get('logged');
            $customer=UMSCustomer::where('C_id',$user)->first();
           // $orders=UMSCustomer::with('orders')->get(); 
           
           return view('Customer.cart')->with('carts',$customer->orders);
            
            

    }*/

public function destroy($Cart_id) {
    UMSCart::destroy($Cart_id);
     return redirect()->back();
 }



function confirmorderr(Request $req){
   
        $user=session()->get('logged');
        $carts = UMSCart::where('C_id',$user)->get();
        
       foreach($carts as $cartsorder){
            $confirmorder = new UMSConfirm_order;
            $confirmorder ->Shipping_place = $req->Shipping_place;
            $confirmorder->Payment_type = $req->Payment_type;
            $confirmorder->P_id = $cartsorder['P_id'];
            $confirmorder->C_id = $cartsorder['C_id'];
            $confirmorder->save();
            UMSCart::where('C_id',$user)->delete();
           
      }
      return redirect()->route("dashboard");
    }



/*
 public function editcart($O_id)

    {

        $order = UMSOrders::find($C_id);
        //return redirect()->route('product.EditProduct');
        return view('Customer.cart', compact('order'));

    }

    public function update(Request $req,$C_id){

        $order = UMSOrders::find($C_id);
       

        $order->Shipping_place = $req->Shipping_place;

        $order->Payment_type =$req->Payment_type;

        $order->update();
        return redirect()->route('dashboard');

        //return redirect()->route('productdetails');

           

    }


   */

}
