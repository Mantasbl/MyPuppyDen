<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Image;
use Storage;
use User;
use Auth;
use authAdminController;
use Web;

class ProductController extends Controller
{

    public function __construct()
    {

      //https://stackoverflow.com/questions/45055618/laravel-5-4-cant-access-authuser-in-the-construct-method
      //Admin authorization, can use product CRUD only if its an admin user
      $this->middleware('auth')->except(['shop', 'show']);
      $this->middleware(function ($request, $next) {
        $this->user = Auth::user();
        return $next($request);
      });

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function shop() {
      $products = Product::latest()->paginate(20);


      return view('products.shop',compact('products'))
          ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function index()
    {

        $products = Product::latest()->paginate(20);


        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($this->user->isAdmin !=1) {
          abort(403);
        }
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->user->isAdmin !=1) {
          abort(403);
        }
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);


        // Creating product with specified parameters
        // Not using Product::Create due to inability to correctly upload image to the DB
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->material = $request->material;

        //Image upload section
        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          Image::make($image)->/*resize(150,150)->*/save( public_path('/images/product_images/'. $filename));
          $product->image = $filename;
        }
        $product->save();
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if ($this->user->isAdmin !=1) {
          abort(403);
        }
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if ($this->user->isAdmin !=1) {
          abort(403);
        }
        $request->validate([
          'name' => 'required',
          'description' => 'required',
          'price' => 'required'
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($this->user->isAdmin !=1) {
          abort(403);
        }
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
