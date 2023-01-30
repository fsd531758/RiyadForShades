<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model=Category::class;
    public function definition()
    {
        return [
            'image' => 'storage/image_359-1660031677.png',

            'ar' => [
                'name' => 'Category'.$this->faker->numberBetween(1,40),
            ],
            'en' => [
                
                'name' => $this->faker->numberBetween(1,40).'التصنيف',
            ]
        ];
    }
}
