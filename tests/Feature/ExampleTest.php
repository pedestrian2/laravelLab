<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use \Illuminate\Foundation\Testing\WithoutMiddleware, 
        \Illuminate\Foundation\Testing\DatabaseMigrations, 
        \Illuminate\Foundation\Testing\DatabaseTransactions;
    
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
    
    public function testView() 
    {
        $this->visit('/')
             ->see('127.0.0.1');
    }
}
