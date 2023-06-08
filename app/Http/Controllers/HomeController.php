<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('landing.home', [
            'products' => Product::orderBy('created_at', 'desc')->where('is_archived', false)->limit(4)->get(),
            'categories' => Category::with(['products' => function (Builder $query) {
                $query->where('is_archived', false);
            }])->limit(3)->get(),
        ]);
    }
}
