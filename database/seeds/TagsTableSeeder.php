<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            "cucchiaio",
            "2022",
            "HouseOfTheDragon",
            "Naruto",
            "Dragonball",
            "php",
            "Inter",
            "Real Madrid",
            "Pentesting",
            "js",
            "MoneyHeist",
            "1984"
        ];

        foreach ($tags as $tag){
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->save();
        }
    }
}
