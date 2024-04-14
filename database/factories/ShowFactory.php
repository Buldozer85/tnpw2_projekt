<?php

namespace Database\Factories;

use App\Models\Show;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ShowFactory extends Factory
{
    protected $model = Show::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'date_of_premiere' => $this->faker->date(),
            'icon' => 'random/' . $this->faker->image('public/storage/shows/random',400,300, null, false),
            'type' => $this->faker->randomElement(['series', 'movie']),
            'parameters' => json_encode([
                'length' => $this->faker->numberBetween(25,4000),
                'count_of_seasons' => $this->faker->numberBetween(1,21),
                'count_of_episodes' => $this->faker->numberBetween(1, 4000),
            ]),
            'deleted_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
