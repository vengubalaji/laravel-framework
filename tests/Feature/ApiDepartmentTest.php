<?php

namespace Tests\Feature;

use App\Models\Departments;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiDepartmentTest extends TestCase
{
    use RefreshDatabase;

    public function testAddDepartment()
    {
        
        Departments::factory()->create();        

        $response = $this->json('GET', '/api/v1/departments');

        $response->assertStatus(200)
            ->assertJsonStructure(['data', 'links', 'meta'])
            ->assertJsonCount(1, 'data');
    }

    public function testAddingDepartmentWhenNotAuthenticated()
    {
        Departments::factory()->create();

        $response = $this->json('POST', '/api/v1/departments', [
            "name" => "AE",
            "desc" => "Aerospace Engineering"
        ]);

        $response->assertUnauthorized();
    }

    public function testAddingDepartmentWhenAuthenicated()
    {
        Departments::factory()->create();

        $response = $this->actingAs($this->user(), 'api')->json('POST', '/api/v1/departments', [
            "name" => "AE",
            "desc" => "Aerospace Engineering"
        ]);

        $response->assertStatus(200);
    }

    public function testAddingDepartmentWithInvalidData()
    {

        Departments::factory()->create();

        $response = $this->actingAs($this->user(), 'api')->json('POST', '/api/v1/departments', []);

        $response->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "name"=> [
                        "The name field is required."
                    ],
                    "desc"=> [
                        "The desc field is required."
                    ]
                ]
            ]);
    }

}
