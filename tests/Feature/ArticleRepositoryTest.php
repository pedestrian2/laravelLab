<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Article;
use App\Repositories\ArticleRepository;

class ArticleRepositoryTest extends TestCase
{
    protected $repository = null;
    
    protected function seedData()
    {
        for ($i=1; $i<=100; $i++) {
            Article::create([
                'title' => 'title' . $i,
                'body' => 'body' . $i,
            ]);
        }
    }
    
    public function setUp()
    {
        parent::setUp();
        $this->initDatabase();
        $this->seedData();
        $this->repository = new ArticleRepository();
    }
    
    public function tearDown()
    {
        $this->resetDatabase();
    }
    
    public function testFetchLatest10Articles()
    {
        $articles = $this->repository->latest10();
        $this->assertEquals(10, count($articles));
        
        $i = 100;
        foreach ($articles as $article) {
            $this->assertEquals('title' . $i, $article->title);
            $i -= 1;
        }
    }
    
    public function testCreateArticle()
    {
        $latest_id = 101;
        $article = $this->repository->create([
            'title' => 'title' . $latest_id,
            'body' => 'body' . $latest_id,
        ]);
        $this->assertEquals($latest_id, $article->id);
    }
}
