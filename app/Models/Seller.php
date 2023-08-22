<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class Seller extends Model
{
    use HasUuids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'address', 'photo', 'village_code', 'district_code'];

    // public function village(): BelongsTo
    // {
    //     return $this->belongsTo(Village::class);
    // }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Interact with the seller's photo.
     */
    protected function photo(): Attribute
    {
        return Attribute::make(
            get: fn ($file) => $file ? Storage::url($file): null,
            set: fn ($file) => $file->storeAs('public/images/sellers', $file->hashName()),
        );
    }

    /**
     * Interact with the seller's village.
     */
    protected function villageCode(): Attribute
    {
        return Attribute::make(
            get: fn ($code) => Village::firstWhere('code', $code),
        );
    }

    /**
     * Interact with the seller's district.
     */
    protected function districtCode(): Attribute
    {
        return Attribute::make(
            get: fn ($code) => District::firstWhere('code', $code),
        );
    }
}
