<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductAdd;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::latest()->paginate(5);
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::all();
        $color = Color::all();
        $brand = Brand::all();
        $category = Category::all();
        return view('admin.product.create',compact('supplier','color','brand','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'image'=> 'required|mimes:png,jpg,webp',
            'description'=>'required',
            'buy_price'=>'required',
            'sale_price'=>'required',
            'discount_price'=>'required',
            'total_quantity'=>'required',
            'supplier_id'=>'required',
            'brand_id'=>'required',
            'category_id'=>'required',
            'color_id*'=>'required',
        ]);

        $file = $request->file('image');
        $file_name = uniqid().$file->getClientOriginalName();
        $file->move(public_path('/image'),$file_name);

        $product = Product::create([
            'brand_id'=> $request->brand_id,
            'category_id'=> $request->category_id,
            'supplier_id'=> $request->supplier_id,
            'name'=>$request->name,
            'image'=>$file_name,
            'description'=>$request->description,
            'buy_price'=>$request->buy_price,
            'sell_price'=>$request->sale_price,
            'discount_price'=>$request->discount_price,
            'total_quantity'=>$request->total_quantity,
            'view_count'=>0,
        ]);

        
        ProductAdd::create([
            'product_id' => $product->id,
            'supplier_id' => $request->supplier_id,
            'total_quantity'=>$request->total_quantity,
            'description'=>$request->buy_description,
        ]);

        $p = Product::find($product->id);

        $p->color()->sync($request->color_id);

        return redirect()->back()->with('success','Product Created Success');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::all();
        $color = Color::all();
        $brand = Brand::all();
        $category = Category::all();
        $product = Product::with('color','category','brand')->where('id',$id)->first();
        return view('admin.product.edit',compact('color','brand','category','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::where('id',$id);

        if($request->file('image')){
            $file = $request->file('image');
            $file_name = uniqid().$file->getClientOriginalName();
            $file->move(public_path('/image'),$file_name);
            File::delete(public_path('/image').'/'.$product->first()->image);
    }else{
        $file_name = $product->first()->image;
    }

    $product->update([
        'image'=>$file_name,
        'name'=>$request->name,
        'description'=>$request->description,
        'sell_price'=>$request->sale_price,
        'discount_price'=>$request->discount_price,
        'brand_id'=>$request->brand_id,
        'category_id'=>$request->category_id
    ]);

    $p = Product::find($product->first()->id);
    $p->color()->sync($request->color_id);
    return redirect()->back()->with('success','Success Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id);

        File::delete(public_path('/images').$product->first()->image);

        $p = Product::find($product->first()->id);
        $p->color()->sync([]);
        $product->delete();
        return redirect()->back()->with('success','Product Deleted');
    }
}
