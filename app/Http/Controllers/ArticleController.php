<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
Use App\Http\resources\Article as ArticleResource;


class ArticleController extends Controller
{

    public function index()
    {
        // get articles
        $articles = Article::paginate(15);

        //return collection of articles as a resource
        return ArticleResource::collection($articles);
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
