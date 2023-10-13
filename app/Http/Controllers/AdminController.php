<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Models\Products;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('Admin.Dashboard');
    }

    public function product(){
        return view('Admin.Product');
    }

    public function add_new_product(){
        return view('Admin.Product');
    }

    public function store_product(StoreProduct $product){
        $data = $product->validate();
        $data['sku'] = rand(1,60000);
        $data['image_id']='1';
       if (Products::create($data)){
           return redirect(url('admin/product'))->whith('message','Product created');
       }else{
           return redirect()->back()->whith('message','Product dont saved');
       }
    }
}
