<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        if (Auth::user()->role->name == 'User') {
            return redirect()->route('product.index');
        } else {
            return view('dashboard', ['product_count' => $productCount, 'category_count' => $categoryCount, 'user_count' => $userCount]);
        }
        
    }
}