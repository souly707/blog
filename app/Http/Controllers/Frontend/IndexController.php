<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'media', 'user'])
            ->whereHas('category', function ($query) {
                $query->whereStatus(1);
            })
            ->whereHas('user', function ($query) {
                $query->whereStatus(1);
            })
            ->wherePostType('post')->whereStatus(1)->orderBy('id', 'desc')->paginate(5);

        return view('frontend.index', compact('posts'));
    }


    public function post_show($slug)
    {
        $post = Post::with(['category', 'media', 'user', 'approved_comments' => function ($query) {
            $query->orderBy('id', 'desc');
        }])
            ->whereHas('category', function ($query) {
                $query->wherestatus(1);
            })
            ->whereHas('user', function ($query) {
                $query->wherestatus(1);
            })
            ->whereSlug($slug)->wherePostType('post')->whereStatus(1)->first();

        if (!empty($post)) {
            return \view('frontend.post', \compact('post'));
        } else {
            return \redirect()->route('frontend.index');
        }
    }

    public function store_comment(Request $request, $slug)
    {
        \dd($request->all(), $slug);
    }
}
