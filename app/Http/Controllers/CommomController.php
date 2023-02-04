<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\JsonLd;

// OR
use Artesaos\SEOTools\Facades\SEOTools;

class CommomController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('berbagi Bahagia');
        SEOMeta::setDescription('');
        SEOMeta::setCanonical('');

        $posts = Post::all();

        return view('myindex', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);

        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($post->resume);
        SEOMeta::addMeta('article:section', $post->category, 'property');


        return view('myshow', compact('post'));
    }

    public function seo($id)
    {
        //Tambahkan meta tag title
        meta('title', $article->title);

        //tambahkan meta tag description
        meta('description', $article->description);

    }

    
}