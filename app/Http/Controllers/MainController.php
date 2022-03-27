<?php

namespace App\Http\Controllers;

use App\Mail\ProductsMail;
use App\Models\Categories;
use App\Models\Image as img;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{

    /**Return the home page that the user will see containing all the products */
    function welcome()
    {
        $products = Product::all();
        return view('welcome' , compact('products'));
    }

    /**Return the dashboard for the admin where he will be able to see Categories/Products and perform all operations */

    public function index()
    {
        $products = Product::all();
        $categories =Categories::all();
        return view('dashboard' , compact('categories' , 'products'));
    }
    /**Get detailed info of a particular product  */
    function checkProduct($id)
    {
        $product = Product::find($id);
        $images = img::all();
        return view('productInfo' , compact('product' , 'images'));
    }
    /***Adding a new Category */
    function addCategory(Request $request)
    {
        $request->validate([
            'title' => 'required|',
        ]);

        Categories::insert([
            'title' => request('title'),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        return back()->with('success' , 'successfully Added');
    }

    /**Add new Product */
    function addProduct(Request $request)
    {
        $request->validate([
            'title' => 'required|',
            'category_id' => 'required|',
            'description' => 'required|',
            'product_image' => 'required|',
        ]);

        $product = Product::create([
            'title' => request('title'),
            'category_id' => request('category_id'),
            'description' => request('description'),
            'date' => Carbon::now()->toDateTimeString(),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        /**This piece of code control the multiple images upload  */
        foreach ($request->file('product_image') as $imageFile) 
        {
            $imgsizes = $imageFile->getSize();
            $filename = time() . '.' . $imageFile->getClientOriginalExtension();           
            $imageFile->move('uploads/'.$product->title.'/' , $filename );
            img::insert([
                'name' => $filename,
                'path' => 'uploads/'.$product->title.'/'. $filename ,
                'size' => $imgsizes,
                'product_id' => $product->id,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        }
        $users = User::where('is_Admin' , !1)->get();
        // dd($users);
        foreach ($users as $user ) {
            $details = [
                'greeting' =>'Hello ' .$user->name  ,
                'subject'  => 'New Arrival',
                'message'  => 'We would like to inform you that there is a new product added to our list, go check it out'
                ];
                Mail::to($user->email)->send(new ProductsMail($details));
        }


        return back()->with('success' , 'successfully Added');
    }


/***Deleting the Product */
    function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('success' , 'Deleted Successfully');
    }
}
