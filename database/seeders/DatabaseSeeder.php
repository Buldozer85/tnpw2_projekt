<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Show;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
/*      Show::factory()->count(100)->create();

         //User::factory(100)->create();
*/
         Review::factory()->count(300)->state(
             new Sequence(
                 fn (Sequence $sequence) =>   [
                     'user_id' => User::all()->random()->id,
                     'show_id' => Show::all()->random()->id
                 ],
             )

         )->create();
/*
         foreach (Show::all() as $show) {
             DB::statement('INSERT INTO trix_rich_texts (field, model_type, model_id, content) VALUES (?,?,?,?)', ['description', 'App\Models\Show', $show->id, fake()->realText()]);
         }

        // Show::factory(100)->create();
*/



    }
}
