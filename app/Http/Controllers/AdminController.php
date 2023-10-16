<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckAdmin;
use App\Http\Requests\StoreProduct;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'api','checkAdmin']);
    }

    public function index(){

        return view('Admin.Dashboard',[
            'product'=>Products::count(),
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }


}
