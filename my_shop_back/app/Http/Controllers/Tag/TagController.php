<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Tag;

class TagController extends Controller
{

    public function index()
    {
        return view('tag.index', ['tags' => Tag::query()->paginate(5)]);
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(StoreRequest $request)
    {
        $dataTag = $request->validated();
        Tag::query()->firstOrCreate(['title' => mb_strtolower($dataTag['title'])]);
        return redirect()->route('tags.index');
    }

    public function show(Tag $tag)
    {
        return view('tag.show', ['tag' => $tag]);
    }

    public function edit(Tag $tag)
    {
        return view('tag.edit', ['tag' => $tag]);
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $tag = $tag->update($request->validated());
        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index');
    }
}
