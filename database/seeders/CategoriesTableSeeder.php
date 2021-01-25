<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $now = Carbon::now()->toDateTimeString();

         Category::insert([
             ['name' => 'Crates', 'slug' => 'crates', 'created_at' => $now, 'updated_at' => $now],
             ['name' => 'Familiars', 'slug' => 'familiars', 'created_at' => $now, 'updated_at' => $now],
             ['name' => 'Spells', 'slug' => 'spells', 'created_at' => $now, 'updated_at' => $now],
             ['name' => 'Patronus', 'slug' => 'patronus', 'created_at' => $now, 'updated_at' => $now],
             ['name' => 'Potion Bundles', 'slug' => 'potionBundles', 'created_at' => $now, 'updated_at' => $now],
             ['name' => 'Outfit Bundles', 'slug' => 'outfitBundles', 'created_at' => $now, 'updated_at' => $now],
             ['name' => 'Money Bundles', 'slug' => 'moneyBundles', 'created_at' => $now, 'updated_at' => $now],
             ['name' => 'Pets', 'slug' => 'pets', 'created_at' => $now, 'updated_at' => $now],
         ]);
    }
}
