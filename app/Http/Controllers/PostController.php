<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use PHPUnit\Exception;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('frontend.feed.index', [
            'posts' => Post::with('media', 'user', 'comments.commentator')->inRandomOrder()->get(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StorePostRequest $request)
    {
        try {
            $post = Post::create($request->validated());

            if ($request->has('image')) {
                $post->addMediaFromRequest('image')
                    ->toMediaCollection('post');
            }

            if ($request->has('clip')) {
                $post->addMediaFromRequest('clip')
                    ->toMediaCollection('post');
            }

//            $post->user_id = auth()->id();
//            $post->save();

            toast('Post was saved successfully.', 'success');

            return redirect(route('posts.index'));
        } catch (FileIsTooBig $e) {
            toast('The file is too big. Please try uploading a smaller one.', 'error');

            return redirect(route('posts.index'));
        } catch (\Exception $e) {
            toast('Something went terribly wrong. Please try again later.', 'error');

            return redirect(route('posts.index'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post)
    {
        return view('frontend.feed.show', [
            'post' => $post,
            'user' => $post->user,
            'comments' => $post->comments,
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        toast('Post updated successfully.', 'success');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();

            toast('Post deleted successfully.', 'success');

            return redirect(route('posts.index'));
        } catch (\Exception $e) {
            toast('Something went totally wrong. We\'ll fix that for yah!', 'error');

            return back();
        }

    }

    /**
     * @param Post $post
     * @param Request $request
     * @return  Redirector|Application|RedirectResponse
     */
    public function comment(Request $request, Post $post): Redirector|Application|RedirectResponse
    {
        try {
            $validated = $request->validate([
                'comment' => 'required|string|min:3|max:255',
            ]);

            $post->comment($validated['comment']);

            return redirect(route('posts.show', [$post]));
        } catch (ValidationException $exception) {
            toast($exception->getMessage(), 'error');

            return back();
        }

    }
}
