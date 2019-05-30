<?php

use Illuminate\Database\Seeder;

class CharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Character::class, 300)->create()->each(function(App\Character $character){
            $character->seasons()->attach([
                rand(1,5),
                rand(6,14),
                rand(15,20),
            ]);
        });
    }
}
