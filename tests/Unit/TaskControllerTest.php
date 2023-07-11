<?php

namespace Tests\Unit;

use App\Models\Admin;
use App\Models\Statistics;
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

    public function stats_update_test()
    {
        $userId= User::factory()->create()->id;

        $stat=Statistics::factory()->create([
            'user_id' => $userId,
        ]);
        $oldTaskNumber=$stat->tasks_no;
        $request=[
            "title" => "What",
            "description" => "Hello There",
            "assigned_to_id" => $userId,
            "assigned_by_id" => Admin::factory()->create(),
        ];

        $response=$this->post('/tasks',$request);
        $this->assertDatabaseHas('statistics', ["user_id" =>$userId,'tasks_no' => $oldTaskNumber+1]);
    }

    public function list_tasks()
    {
        $this->expectException(ValidationException::class);
        $request=[
            "title" => "What",
            "description" => "Hello There",
            "assigned_to_id" => null,
            "assigned_by_id" => Admin::factory()->create(),
        ];
        $response=$this->post('/tasks',$request);
    }
}
