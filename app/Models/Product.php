<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasUuids, SoftDeletes;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_archived' => false,
    ];

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    /**
     * The categories that belong to the product.
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    /**
     * Interact with the product's photo.
     */
    protected function photo(): Attribute
    {
        return Attribute::make(
            get: fn ($file) => $file ? Storage::url($file) : null,
            set: fn ($file) => $file->storeAs('public/images/sellers', $file->hashName()),
        );
    }

    /**
     * Interact with the product's price.
     */
    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ($price) => number_format($price, 0, ',', '.'),
        );
    }

    // /**
    //  * Interact with the product's description.
    //  */
    // protected function description(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($desc) => $desc ? $desc : 'Tidak ada deskripsi produk.',
    //     );
    // }

    // /**
    //  * Interact with the product's specification.
    //  */
    // protected function specification(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($spec) => $spec ? $spec : 'Tidak ada spesifikasi produk.',
    //     );
    // }
}
