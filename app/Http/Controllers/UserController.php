<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        return view('frontend.profile.index', compact('user'), [
            'posts' => $user->posts,
            'topics' => $user->topics,
            'friends' => $user->getFriends()
        ]);
    }


    public function myProfile()
    {
        return view('frontend.profile.profile', [
            'posts' => auth()->user()->posts,
            'topics' => auth()->user()->topics,
            'friends' => auth()->user()->getFriends()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            if ($request->filled(['name', 'username', 'email'])) {
                $user->update($request->validated());
            }

            if ($request->has('avatar')) {
                $user->addMediaFromRequest('avatar')
                    ->toMediaCollection('avatar');
            }

            toast('Profile saved successfully', 'success');

            return redirect(route('profile.show', [$user]));
        } catch (FileDoesNotExist $e) {
            toast('Something went totally wrong. We\'ll fix that for yah!', 'error');

            return redirect(route('profile.show', [$user]));
        } catch (FileIsTooBig $e) {
            toast('The file you uploaded is too big. Please try uploading a smaller one!', 'error');

            return redirect(route('profile.show', [$user]));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            return redirect('/');
        } catch (Exception $e) {
            toast('Something went totally wrong. We\'ll fix that for yah!', 'error');

            return back();
        }
    }
}
