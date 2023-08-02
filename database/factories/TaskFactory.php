<?php

namespace Database\Factories;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = array('done' , 'undone');
        return [
            'title' => $this->faker->title,
            'content' => $this->faker->text,
            'cart_id' => Cart::factory(),
            'status' => 'undone',
        ];
    }
}
