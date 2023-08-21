<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagori;
use App\Models\Product;

class AddCatagoriController extends Controller
{
    //





    #add_catagory
    public function add_catagory(Request $request)
    {
        $data = new Catagori;
        $data->catagori_name = $request->catagory;
        $data->save();
        return redirect()->back()->with('message', 'catagori successfully');
    }

    #deleterd_catagory
    public function deleterd_catagory($id)
    {
        $data = Catagori::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'deleted success fully ');
    }


   #add_product
   public function add_product()
   {
        $catagori= Catagori::all();
       return view('admin.product',compact('catagori'));
   }

   #add_view_products

    public function add_view_products(Request $req) {
        $data = new Product;
        $data->title = $req->title;
        $data->description = $req->description;
        $data->catagories = $req->catagories;
        $data->quantity = $req->quantity;
        $data->price = $req->product_price;
        $data->discount_price = $req->discount_price;


        $image=$req->image;
        $imageName= time(). '.'. $image->getClientOriginalExtension();
        $req->image->move('product' , $imageName);
        $data->images=$imageName;



        $data->save();
        return redirect()->back()->with('message', " product upload successfully");
    }




    #show_product
    public function show_product(){
        $product = Product::all();
        return view('admin.show_view_product', compact('product'));
    }

    #deleted_produc

    public function deleted_produc($id){
        $product=Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'deleted success fully ');

    }

    #update_products

    public function update_products($id){
        $product=Product::find($id);
        $catagori=Catagori::all();
        return view('admin.update_view_products',compact('product','catagori'));
    }

    public function update_product_edit(Request $req,$id){
        $product = Product::find($id);
        $product->title = $req->title;
        $product->description = $req->description;
        $product->catagories = $req->catagories;
        $product->quantity = $req->quantity;
        $product->price = $req->product_price;
        $product->discount_price = $req->discount_price;


        $image=$req->image;
       if ($image) {
        # code...
        $imageName= time(). '.'. $image->getClientOriginalExtension();
        $req->image->move('product' , $imageName);
        $product->images=$imageName;

       }



        $product->save();
        return redirect()->back()->with('message', "product upload view successfully");

    }
}
