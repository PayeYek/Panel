<?php

namespace App\Http\Controllers\Web\Panel;


use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\TagRequest;
use App\Models\Tag;
use App\Tables\Tags;
use ProtoneMedia\Splade\Facades\Splade;

class TagController extends Controller
{

    public function index()
    {
        return view('panel.tag.index', [
            'items' => Tags::class
        ]);
    }


    public function create()
    {
        return view('panel.tag.create');
    }


    public function store(TagRequest $request)
    {
        Tag::create($request->validated());

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return back();
    }


    public function edit(Tag $tag)
    {
        return view('panel.tag.edit', compact('tag'));
    }


    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return back();
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

}
