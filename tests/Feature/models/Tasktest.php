<?php

namespace Tests\Feature\models;

use App\Models\Cart;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Tasktest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Insert_data()
    {
        $data = Task::factory()->make()->toArray();
        Task::create($data);
        $this->assertDatabaseHas('tasks' , $data);
    }

    public function test_Task_relation_with_Cart(){
        $task = Task::factory()->for(Cart::factory())->create();
        $this->assertTrue(isset($task->cart->id));
        $this->assertTrue($task->cart instanceof Cart);
    }
}
