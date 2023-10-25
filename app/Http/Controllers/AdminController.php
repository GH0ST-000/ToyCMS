<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'api','checkAdmin']);
    }

    public function index(){
        $products = Products::all();
        $price = 0;
        foreach ($products as $product){
            $price = $price+$product->price;
        }
        return view('Admin.Dashboard',[
            'product'=>Products::all()->count(),
            'price'=>$price,
            'category'=>Category::all()->count()

        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }


}
