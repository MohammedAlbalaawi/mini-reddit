<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommunityRequest;
use App\Models\Community;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{

    public function index()
    {
        $communities = Community::where('user_id', Auth::user()->id)->get();
        return view('communities.index', compact('communities'));
    }


    public function create()
    {
        $topics = Topic::all();
        return view('communities.create', compact('topics'));
    }


    public function store(StoreCommunityRequest $request)
    {
        $community = $request->validated();

        $community = Community::create($community);
        $community->topics()->attach($request->topics);

        return redirect()->route('communities.index', $community)->with('success','Community created successfully');

    }


    public function show(Community $community)
    {
        return view('communities.show', compact('community'));
    }


    public function edit(Community $community)
    {
        $topics = Topic::all();
        $community->load('topics');
        return view('communities.edit', compact('community','topics'));
    }


    public function update(StoreCommunityRequest $request, Community $community)
    {
        $community->update($request->validated());
        $community->topics()->sync($request->topics);

        return redirect()->route('communities.index')->with('info','Community updated successfully');
    }

    public function destroy(Community $community)
    {
        $community->delete();
        return redirect()->route('communities.index')->with('info','Community deleted successfully');
    }
}
