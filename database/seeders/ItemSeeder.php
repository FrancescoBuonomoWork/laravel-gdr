<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $itemsName = ['Long Sword', 'Bow', 'Dagger', 'Axe', 'Staff', 'Mace', 'Shield', 'Katana', 'Rapier', 'Scythe', 'Sickle'];
        $itemsQuality = ['Poor', 'Common', 'Uncommon', 'Rare', 'Epic', 'Legendary', 'Mythical'];
        foreach ($itemsName as $itemName) { 
            $new_item = new Item();
            $new_item ->name = $itemName;
            $new_item ->quality = $faker->randomElement($itemsQuality);
            $new_item ->item_level = $faker->numberBetween(5,99);
            $new_item->damage = $faker ->numberBetween(10, 99999999);
            $new_item->save();
        }
    }
}
