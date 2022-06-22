<?php

namespace Database\Seeders;

//use App\Models\Categorie;
//use App\Models\Product;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('local')->delete(Storage::allFiles('images'));
        $ids = range(1, 15);
        Product::factory(80)->create()->each(function ($product) use ($ids) {
			shuffle($ids);
            $categorie = Category::find(rand(1, 2));
            $product->category()->associate($categorie);
            $product->sizes()->attach(array_slice($ids, 0, rand(1, 3)));
            
            $product->save();

        });
    }
}
