<?php

namespace Tests\Feature\models;

use App\Models\Cart;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CartTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Insert_data()
    {
        $data = Cart::factory()->make()->toArray();
        Cart::create($data);
        $this->assertDatabaseHas('carts' , $data);
    }

    public function test_Cart_relation_with_user(){
        $cart = Cart::factory()->for(User::factory())->create();
        $this->assertTrue(isset($cart->user->id));
        $this->assertTrue($cart->user instanceof User);
    }

    public function test_Cart_relation_with_task(){
        $count = rand(0, 5);
        $cart = Cart::factory()->has(Task::factory()->count($count))->create();
        $this->assertCount($count , $cart->tasks);
        $this->assertTrue($cart->tasks->first() instanceof Task);
    }
}
