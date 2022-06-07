<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     */
    public function __invoke(): Factory|View|Application
    {
        return view('frontend.home', [
            'posts' => Post::with('media', 'user', 'comments.commentator')->take(5)->get(),
        ]);
    }
}
