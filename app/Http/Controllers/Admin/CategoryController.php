<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.categories.list', [
            'categories' => Category::with('products')->orderBy('name')->paginate(10),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'  => 'required',
            'photo' => 'file|image|max:1024',
        ]);

        Category::create($validated);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'  => 'required',
            'photo' => 'file|image|max:1024',
        ]);

        $category = Category::findOrFail($id);

        if ($request->hasFile('photo')) $category->photo = $validated['photo'];

        $category->name = $validated['name'];
        $category->save();

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::with('products')->findOrFail($id);
        $category->products()->detach();

        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
