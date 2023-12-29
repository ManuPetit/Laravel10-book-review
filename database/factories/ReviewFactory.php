<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-2 years');
        return [
            'book_id' => null,
            'review' => fake()->paragraph,
            'rating' => fake()->numberBetween(1,5),
            'created_at' => $startDate,
            'updated_at' => fake()->dateTimeBetween($startDate, 'now')
        ];
    }

    public function good()
    {
        return $this->state(function (array $attribute) {
           return [
               'rating' => fake()->numberBetween(4,5)
           ] ;
        });
    }

    public function average()
    {
        return $this->state(function (array $attribute) {
            return [
                'rating' => fake()->numberBetween(2,5)
            ] ;
        });
    }

    public function bad()
    {
        return $this->state(function (array $attribute) {
            return [
                'rating' => fake()->numberBetween(1,3)
            ] ;
        });
    }
}
