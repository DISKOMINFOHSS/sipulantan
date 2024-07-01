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
            'total_categories'  => Category::all()->count(),
            'total_sellers'     => Seller::all()->count(),
            'total_products'    => Product::all()->count(),
            'total_active_products' => Product::where('is_archived', false)->count(),
            'products'  => Product::with('seller')->orderBy('created_at', 'desc')->limit(8)->get(),
            'sellers'   => Seller::withCount('products')->limit(5)->get(),
        ]);
    }
}
