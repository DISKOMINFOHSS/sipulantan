<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.list', [
            'products' => Product::paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.products.create', [
            'sellers' => Seller::orderBy('name')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required',
            'seller'    => 'required',
            'price'     => 'required',
            'photo'     => 'required|file|image|max:1024',
        ]);

        $product = new Product;
        $product->name = $validated['name'];
        $product->seller_id = $validated['seller'];
        $product->price = $validated['price'];
        $product->photo = $validated['photo'];

        $product->discount = $request->input('discount');
        $product->description = $request->input('description');
        $product->specification = $request->input('specification');

        if ($request->input('archive')) $product->is_archived = true;

        $product->save();

        if ($request->input('category')) {
            $product->categories()->attach($request->input('category'));
        }

        return redirect()->route('admin.products.index');
    }

    public function edit(string $id): View
    {
        return view('admin.products.edit', [
            'product' => Product::find($id),
            'sellers' => Seller::orderBy('name')->get()
        ]);
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name'      => 'required',
            'seller'    => 'required',
            'price'     => 'required',
            'photo'     => 'file|image|max:1024',
        ]);

        $product->name = $validated['name'];
        $product->seller_id = $validated['seller'];
        $product->price = $validated['price'];

        if ($request->hasFile('photo')) {
            $product->photo = $validated['photo'];
        }

        $product->discount = $request->input('discount');
        $product->description = $request->input('description');
        $product->specification = $request->input('specification');
        $product->is_archived = $request->input('archive') ? true : false;

        $product->save();

        if ($product->categories[0]->id != $request->input('category')) {
            $product->categories()->detach($product->categories[0]->id);
            $product->categories()->attach($request->input('category'));
        }

        return redirect()->route('admin.products.index');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->categories()->detach();
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
