<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Image;
use App\Models\Post;
use App\Models\VideoClip;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('frontend.index', [
            'postsWithImages' => Post::has('image')->get(),
            'postsWithClips' => Post::has('clip')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());

        if ($request->has('image')) {
            $fileName = Str::kebab(strtolower($request->file('image')->getClientOriginalName())) . '.' . $request->file('image')->getClientOriginalExtension();

            $path = $request->file('image')->storeAs(
                'post_images',
                $fileName,
            );

            $image = Image::create([
                'image_path' => $path
            ]);

            $image->imageable()->associate($post)->save();
        }

        if ($request->has('clip')) {
            $fileName = Str::kebab(strtolower($request->file('clip')->getClientOriginalName()));

            $path = $request->file('clip')->storeAs(
                'post_clips',
                $fileName,
            );

            $clip = VideoClip::create([
                'clip_path' => $path
            ]);

            $clip->clipable()->associate($post)->save();
        }


        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePostRequest $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
