<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Seller;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function __invoke(string $id)
    {
        return view('landing.sellers.detail', [
            'categories' => Category::orderBy('name')->get(),
            'seller' => Seller::withWhereHas('products', function (Builder $query) {
                $query->where('is_archived', false);
            })->find($id),
        ]);
    }
}
