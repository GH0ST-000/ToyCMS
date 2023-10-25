<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Models\Category;
use App\Models\Image;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'api','checkAdmin']);
    }
    public function product(){
        return view('Admin.Product',[
            'products'=>Products::all(),
        ]);
    }

    public function add_new_product(){

        return view('Admin.Add.AddProduct',[
            'categories'=>Category::all()
        ]);
    }

    public function store_product(Request $request){
        $relativePath = $this->saveImage($request->image);
        $sku = rand(1,60000);
        $cat_id = '';

        if (isset($request->category)){
            $cat_id = $request->category;
        }else{
            $cat_id = 01001;
        }
        $data = [
            'name'=>$request->name,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'image_id'=>URL::to(Storage::url($relativePath)),
            'sku'=> $sku,
            'category_id'=>$cat_id,
            'description'=>$request->description
        ];
        if (Products::create($data)){
            $product= Products::where('sku',$sku)->first();
            Image::create([
                'product_id'=>$product->id,
                'image_url'=>$this->saveImage($request->image),
            ]);
            return redirect('admin/product')->with('message','Product created');
        }else{
            return redirect()->back()->whith('message','Product dont saved');
        }
    }


    private function saveImage($image)
    {

        $path = 'images/' . Str::random();
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path, 0755, true);
        }
        if (!Storage::putFileAS('public/' . $path, $image, $image->getClientOriginalName())) {
            throw new \Exception("Unable to save file \"{$image->getClientOriginalName()}\"");
        }
        return $path . '/' . $image->getClientOriginalName();
    }

    public function show($id){
       return view('Admin.Edit.EditProduct',[
           'product'=>Products::where('id',$id)->first()
       ]);
    }

    public function UpdateProduct(Request $request,$id){
        if ($request->image != null){
            $relativePath = $this->saveImage($request->image);
            $data = [
                'name'=>$request->name,
                'price'=>$request->price,
                'qty'=>$request->qty,
                'image_id'=>URL::to(Storage::url($relativePath)),
                'description'=>$request->description
            ];

        }else{
            $data = [
                'name'=>$request->name,
                'price'=>$request->price,
                'qty'=>$request->qty,
                'description'=>$request->description
            ];
        }
        if (Products::where('id',$id)->update($data)){
            return redirect('admin/product')->with('message','Product updated');
        }else{
            return redirect()->back()->whith('message','Product dont updated');
        }


    }

    public function destroy($id){
        $product = Products::find($id);
        if ($product->delete()){
            return redirect('admin/product')->with('message','Product deleted');
        }
    }

}
