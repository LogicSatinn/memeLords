<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    public function index()
    {
        return view('frontend.friends.index', [
            'friends' => auth()->user()->getFriends(),
            'otherFriends' => auth()->user()->getFriendsOfFriends()
        ]);
    }


    public function processFriendRequest(User $user): RedirectResponse
    {
        auth()->user()->befriend($user);

        toast('Friend Request sent successfully', 'success');

        return back();
    }


    public function acceptFriendRequest(User $user): RedirectResponse
    {
        auth()->user()->acceptFriendRequest($user);

        toast('Friend Request accepted successfully', 'success');

        return back();
    }


    public function denyFriendRequest(User $user): RedirectResponse
    {
        auth()->user()->denyFriendRequest($user);

        toast('Friend Request denied', 'success');

        return back();
    }


    public function unfriendUser(User $user): RedirectResponse
    {
        auth()->user()->unfriend($user);

        toast('Unfriended ' . $user->username . ' successfully', 'success');

        return back();
    }
}
