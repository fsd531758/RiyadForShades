<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model=Product::class;
    

    public function definition()
    {
        return [

            'image' => 'storage/image_359-1660031677.png',
            'category_id' => $this->faker->numberBetween(32,51),
            'featured' => $this->faker->numberBetween(0,1),
            'price' => $this->faker->numberBetween(100,1000),
            'stock' => $this->faker->numberBetween(1,100),
            'sku' => $this->faker->numberBetween(10,1000),

            'ar' => [
                'title' => $this->faker->numberBetween(1,20).'المنتج رقم',
                'description' => 'هذا الوصف الخاص بالمنتج',
            ],
            'en' => [
                
                'title' => 'Product'.$this->faker->numberBetween(1,20),
                'description' => 'This is the description of the product',
            ]
        ];
        
    }
}
