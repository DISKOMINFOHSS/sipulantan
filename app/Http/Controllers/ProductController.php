<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('landing.products.list', [
            'title'     => 'Semua Produk',
            'categories' => Category::orderBy('name')->get(),
            'products'   => Product::with('seller')->where('is_archived', false)
                                ->orderBy('created_at', 'desc')->paginate(16),
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->query('query');

        $q = Product::with('seller')
                ->join('sellers', 'products.seller_id', '=', 'sellers.id')
                ->where('is_archived', false)
                ->where('products.name', 'like', '%'.$keyword.'%')
                ->orWhere('sellers.name', 'like', '%'.$keyword.'%')
                ->orderBy('created_at', 'desc');


        return view('landing.products.list', [
            'query'     => $keyword,
            'title'     => 'Hasil Pencarian',
            'products'  => $q->select('products.*')->paginate(16),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function show(string $id): View
    {
        return view('landing.products.detail', [
            'categories' => Category::orderBy('name')->get(),
            'product' => Product::with(['seller', 'categories'])
                            ->orderBy('created_at', 'desc')->find($id),
        ]);
    }
}
