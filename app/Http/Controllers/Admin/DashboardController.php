<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        return view('admin.dashboard', [
            'categories' => Category::orderBy('name')->get(),
            'products' => Product::with('seller')->orderBy('created_at', 'desc')->get(),
            'sellers' => Seller::with('products')->get(),
            'display_products' => Product::where('is_archived', false)->get(),
        ]);
    }
}
