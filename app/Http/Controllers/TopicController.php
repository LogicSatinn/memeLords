<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Topic;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('frontend.topics.index', [
            'topics' => Topic::with('media')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('frontend.topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTopicRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StoreTopicRequest $request)
    {
        $topic = Topic::create($request->validated());

        if ($request->has('cover_image')) {
            $topic->addMediaFromRequest('cover_image')
                ->toMediaCollection('topics');
        }

        $topic->owner()
            ->associate(auth()->user())
            ->save();

        $topic->users()->attach(auth()->id());

        return redirect(route('topics.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Topic $topic
     * @return Application|Factory|View
     */
    public function show(Topic $topic)
    {
        return view('frontend.topics.show', compact('topic'), [
            'topic' => $topic->load('users', 'posts'),
            'relatedTopics' => Topic::with('users')->whereCategory($topic->category)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Topic $topic
     * @return Application|Factory|View
     */
    public function edit(Topic $topic)
    {
        return view('frontend.topics.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTopicRequest $request
     * @param Topic $topic
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        $topic->update($request->validated());

        if ($request->has('cover_image')) {
            $topic->addMediaFromRequest('cover_image')
                ->toMediaCollection('topics');
        }

        return redirect(route('topics.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Topic $topic
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect(route('topics.index'));
    }
}
