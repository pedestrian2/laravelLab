<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use Redirect;

class ArticleController extends Controller
{
    protected $repository;

    public function __construct(ArticleRepository $repository) {
        $this->repository = $repository;
    }

    public function index()
    {
        $articles = $this->repository->latest10();
        return view('articles.index', compact('articles'));
    }
    
    public function store(Request $request)
    {
        $this->repository->create($request->all());
        
        return Redirect::route('articles.index');
    }
}
