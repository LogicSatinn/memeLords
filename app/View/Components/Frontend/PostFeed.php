<?php

namespace App\View\Components\Frontend;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostFeed extends Component
{

    public Post $post;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
    }


    public function mediaPath()
    {
        return $path = $this->post->image() !== null
            ? $this->post->image?->image_path
            :  $this->post->clip?->clip_path;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        return view('components.frontend.post-feed');
    }
}
