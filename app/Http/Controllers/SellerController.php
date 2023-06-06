<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function __invoke(string $id)
    {
        return view('landing.sellers.detail', [
            'seller' => Seller::with('products')->find($id),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }
}
