<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Seller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Laravolt\Indonesia\Models\District;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.sellers.list', [
            'districts' => District::with('villages')->where('city_code', '6306')->get(),
            'sellers' => Seller::with(['contacts', 'village', 'district'])->paginate(12),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'      => 'required',
            'photo'     => 'file|image|max:1024',
            'type'      => 'required',
            'contact'   => 'required'
        ]);

        $seller = new Seller;
        $seller->name = $validated['name'];
        $seller->address = $request->input('address');
        $seller->village_id = $request->input('village') ? $request->input('village') : null;
        $seller->district_id = $request->input('district') ? $request->input('district') : null;

        if ($request->hasFile('photo')) {
            $seller->photo = $validated['photo'];
        }

        $seller->save();

        $contact = new Contact;
        $contact->type = $validated['type'];

        if ($validated['type'] == 'whatsapp') {
            $contact->contact_info = "https://wa.me/62" . substr($validated['contact'], 1);
        } else {
            $contact->contact_info = $validated['contact'];
        }

        $seller->contacts()->save($contact);

        return redirect()->route('admin.sellers.index');
    }

    public function show(string $id)
    {
        return view('admin.sellers.detail', [
            'districts' => District::with('villages')->where('city_code', '6306')->get(),
            'seller'    => Seller::with(['contacts', 'products', 'district.villages'])->findOrFail($id),
        ]);
        // return response()->json(Seller::with('contacts', 'village', 'district')->find($id));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'      => 'required',
            'photo'     => 'file|image|max:1024',
            'type'      => 'required',
            'contact'   => 'required'
        ]);

        $seller = Seller::with('contacts')->findorFail($id);
        $seller->name = $validated['name'];
        $seller->village_id = $request->input('village');
        $seller->district_id = $request->input('district');

        if ($request->hasFile('photo')) {
            $seller->photo = $validated['photo'];
        }

        $seller->save();

        foreach($seller->contacts as $contact)
        {
            if ($validated['type'] != $contact->type || $validated['contact'] != $contact->contact_info)
            {
                $contact->type = $validated['type'];

                if ($validated['type'] == 'whatsapp') {
                    $contact->contact_info = "https://wa.me/62" . substr($validated['contact'], 1);
                } else {
                    $contact->contact_info = $validated['contact'];
                }

                $contact->save();
            }
        }

        return redirect()->route('admin.sellers.show', ['seller' => $seller->id]);
    }

    public function destroy(string $id)
    {
        $seller = Seller::with(['contacts', 'products', 'products.categories'])
                    ->findOrFail($id);

        foreach($seller->contacts as $contact) {
            $contact->delete();
        }

        foreach($seller->products as $product) {
            $product->categories()->detach();
            $product->delete();
        }

        $seller->delete();

        return redirect()->route('admin.sellers.index');
    }
}
