<?php

namespace Database\Factories;

use App\Enums\StatusEnum;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisementFactory extends Factory
{
//    protected array $values = ['-', '+'];

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'status'=> $this->faker->randomElement([
                StatusEnum::NEW->value,
                StatusEnum::USED->value,
                StatusEnum::RESTORED->value,
                StatusEnum::AS_NEW->value
            ]),
            'final_date' => $this->faker->dateTimeBetween('now', '+'.rand(0, 15).' days'),
            'user_id' => 1,
            'category_id' => Category::all()->random()->id,
        ];
    }
}
