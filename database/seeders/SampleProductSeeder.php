<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Ramsey\Uuid\Uuid;

class SampleProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = Category::create(['name' => 'Makanan & Minuman']);
        Category::create(['name' => 'Kerajinan']);

        $seller = Seller::create([
            'name'          => 'Toko ABC',
            'address'       => 'Jalan Pahlawan No 106',
            'village_code'  => Village::firstWhere('code', '6306051002')->code,
            'district_code' => District::firstWhere('code', '630605')->code
        ]);

        DB::table('contacts')->insert([
            'type' => 'whatsapp',
            'contact_info' => "https://wa.me/6281348655572",
            'seller_id' => $seller->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'id'    => Uuid::uuid4()->toString(),
            'name'  => 'Kopi Susu ABC',
            'price' => 8000,
            'photo' => 'public/images/products/MKVelmMGBn0kWRTPzE2cPnhSLc5S7lOXWuAJoeHr.jpg',
            'is_archived'   => false,
            'seller_id'     => $seller->id,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        DB::table('product_category')->insert([
            'product_id'  => Product::firstWhere('name', 'Kopi Susu ABC')->id,
            'category_id' => $kategori->id,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }
}
