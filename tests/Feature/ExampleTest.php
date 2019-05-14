<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    // public function test日報index()
    // {
    //     $user = factory(User::class)->create();
    //     $response = $this->actingAs($user)->get('/daily_reports');
    //     $response->assertStatus(200);
    // }

    // public function test日報create()
    // {
    //     $user = factory(User::class)->create();
    //     $response = $this->actingAs($user)->get('/daily_reports/create');
    //     $response->assertStatus(200);
    // }

    // public function test日報edit()
    // {
    //     $user = factory(User::class)->create();
    //     $response = $this->actingAs($user)->get('/daily_reports/1/edit');
    //     $response->assertStatus(200);
    // }

    // public function test日報show()
    // {
    //     $user = factory(User::class)->create();
    //     $response = $this->actingAs($user)->get('/daily_reports/1');
    //     $response->assertStatus(200);
    // }

    // public function test日報update()
    // {
    //     $user = factory(User::class)->create();
    //     $response = $this->actingAs($user)->put('daily_report/1');
    //     $response->assertStatus(200);
    // }
}
