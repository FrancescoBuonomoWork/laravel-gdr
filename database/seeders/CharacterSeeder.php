<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;
use Faker\Generator as Faker;

class CharacterSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = Type::all();
        $typeIds = $types->pluck("id");

        $items = Item::all();
        $itemIds = $items->pluck("id");

        for ($i = 0; $i < 10; $i++) {
            $new_character = new Character();

            $new_character->name = $faker->name();
            $new_character->bio = $faker->paragraph();
            $new_character->attack = $faker->numberBetween(5, 99);
            $new_character->defense = $faker->numberBetween(5, 99);           
            $new_character->speed = $faker->numberBetween(5, 99);
            $new_character->hp = $faker->numberBetween(5, 99);

            $new_character->type_id = $faker->randomElement($typeIds);
            $new_character->save();

            $new_character->items()->attach($faker->randomElement($itemIds));

          
        }
    }
}
