<?php

namespace App\Repositories;

use App\Article;

/**
 * Description of ArticleRepository
 *
 * @author sheng
 */
class ArticleRepository 
{
    public function latest10()
    {
        return Article::orderBy('id', 'DESC')->limit(10)->get();
    }
    
    public function create(array $attributes)
    {
        return Article::create($attributes);
    }
}
