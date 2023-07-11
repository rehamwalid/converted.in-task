<?php

namespace Tests\Unit;

use App\Models\Admin;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\ValidationException;
use PHPUnit\Framework\TestCase;

class TaskControllerTest extends TestCase
{
    use WithFaker;
    use DatabaseMigrations;
    /** @test */

    public function tasks_create()
    {
        $request=[
            "title" => "What",
            "description" => "Hello There",
            "assigned_to_id" => User::factory()->create(),
            "assigned_by_id" => Admin::factory()->create(),
        ];

        $response=$this->post('/tasks',$request);
        $this->assertDatabaseHas('tasks', ["title" => "What"]);
    }
}
