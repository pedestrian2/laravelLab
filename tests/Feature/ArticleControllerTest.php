<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Session;
use Redirect;

class ArticleControllerTest extends TestCase
{
    protected $repositoryMock;
            
    public function setUp()
    {
        parent::setUp();
        $this->repositoryMock = Mockery::mock('App\Repositories\ArticleRepository');
        $this->app->instance('App\Repositories\ArticleRepository', $this->repositoryMock);
    }
    
    public function tearDown()
    {
        Mockery::close();
    }
    
    
    public function testArticleList()
    {
        $this->repositoryMock
            ->shouldReceive('latest10')
            ->once()
            ->andReturn([]);
        
        $response = $this->call('GET', 'articles');
        $response->assertStatus(200);
        $response->assertViewHas('articles', []);
    }
    
    public function testCsrfFailed()
    {
        $response = $this->call('POST', 'articles');
        $response->assertStatus(500);
    }
    
    public function testCreateArticleSuccess()
    {
        $this->repositoryMock
            ->shouldReceive('create')
            ->once();
        
        Session::start();
        
        $response = $this->call('POST', 'articles',[
            'title' => 'title 999',
            'body' => 'body 999',
            '_token' => csrf_token(),
        ]);
        $response->assertRedirect(url('/articles'));
    }
    
    public function testCreateArticlesFails()
    {
        Session::start();
        
        $response = $this->call('POST', 'articles', [
            '_token' => csrf_token(),
        ]);
        $response->assertSessionHasErrors();

        // 應該會導回前一個 URL
        $response->assertResponseStatus(302);
    }
}
