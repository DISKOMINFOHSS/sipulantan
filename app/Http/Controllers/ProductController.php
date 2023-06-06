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
            'products'   => Product::with('seller')->where('is_archived', false)->paginate(16),
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->query('query');

        $q = Product::with('seller')
                ->join('sellers', 'products.seller_id', '=', 'sellers.id')
                ->where('is_archived', false)
                ->where('products.name', 'like', '%'.$keyword.'%')
                ->orWhere('sellers.name', 'like', '%'.$keyword.'%');

        // return response()->json($q->select('products.*')->get());

        return view('landing.products.list', [
            'query'     => $keyword,
            'title'     => 'Hasil Pencarian',
            'products'  => $q->select('products.*')->get(),
        ]);
    }

    public function show(string $id): View
    {
        return view('landing.products.detail', [
            'product' => Product::with(['seller', 'categories'])->find($id),
        ]);
    }
}
