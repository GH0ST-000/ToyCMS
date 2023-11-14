<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
       $product = Products::orderBy('id','desc')->paginate(16);

       return view('welcome',[
           'products'=>$product
       ]);
    }
}
