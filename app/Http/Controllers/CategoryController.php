<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id = null)
    {
        return view('landing.categories.detail', [
            'categories' => Category::orderBy('name')->get(),
            'c' => Category::findOrFail($id),
            'products' => Product::withWhereHas('categories', function (Builder $query) use ($id) {
                $query->where('categories.id', $id);
            })->where('is_archived', false)->paginate(16),
        ]);
    }
}
