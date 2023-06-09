<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;

class ShowController extends Controller
{
    public function __invoke($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        $date = Carbon::parse($post->created_at);

        $relatedPosts = Post::where('category_id',$post->category_id)->take(3)->get();
        return view('post.show', compact('post', 'date', 'relatedPosts'));
    }
}
