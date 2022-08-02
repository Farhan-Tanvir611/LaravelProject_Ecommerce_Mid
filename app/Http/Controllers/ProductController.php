<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UMSCustomer;
use App\Models\UMSProducts;
use App\Models\UMSOrders;
use App\Models\UMSConfirm_order;
use App\Models\UMSCart;
use App\Models\UMSeller;


class ProductController extends Controller
{
    //
    function addproduct(){

        return view('product.AddProduct');
    }



    function createproduct(){
      return view('Product.CreateProduct');
    }

    function productSubmit(Request $req){

        $this->validate($req,

        [

               

            "p_name"=>"required",

            "P_description"=>"required",

            "P_price"=>"required",

            "P_photo"=>"required|mimes:jpg,png,jpeg",

        ]);
        
        $st = new UMSProducts();
        $st->p_name = $req->p_name;
        $st->P_description =$req->P_description;
        $st->P_price = $req->P_price;
        //$P_photo=$req->P_photo;
        //$P_photo_name = time().'.'.$P_photo->getClientOriginalExtension();
        //$req->P_photo->move('storage.app.profile_images',$P_photo_name);
      //  $st->P_image = $req->File('P_photo');

        /*$st->P_image = $req->file('P_photo')->getClientOriginalExtension();

        $P_image = $req->p_name."_".time().".".$req->file('P_photo')->getClientOriginalExtension();

        $req->file('P_photo')->storeAs('public/profile_images',$P_image);
*/
              $file =$req->file('P_photo');
              $extension = $file->getClientOriginalExtension();
              $filename = time().'.'.$extension;
              $file ->move('storage/profile_images/',$filename);
              $st->P_image = $filename;
   
        /*if($req->hashfile('profile_images'))
        {

            $file = $req->file('profile_images');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/app/profile_images/',$filename);
            $st->profile_images = $filename;
        }*/
        $st->save();
        return redirect()->route('productdetails');  

    }
    function view(){
        $product = UMSProducts::paginate(3);
        return view('Product.plist',['product'=>$product]);

    }

    function search(Request $req){
        $product=UMSProducts::where('P_name','like','%'.$req->input('searchbox').'%')
        ->get();
        //return view('Product.search',['product'=>$data]);
        return view('Product.search')->with('product',$product);
    }

  
}
