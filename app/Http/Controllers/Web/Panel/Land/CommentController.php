<?php

namespace App\Http\Controllers\Web\Panel\Land;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\CommentRequest;
use App\Models\LandComment;
use App\Models\LandProduct;
use App\Tables\Landing\Comments;
use Splade;

class CommentController extends Controller
{

    public function index()
    {
        return view('panel.landing.comment.index', [
            'items' => Comments::class
        ]);
    }

    public function create()
    {
//        $products = LandProduct::latest()->pluck('title','id');
//
//        return view('panel.comment.create', compact('products'));
    }

    public function store(CommentRequest $request)
    {
//        auth()->user()->comments()->create($request->validated());
//
//        \Splade::toast(__('Created'))->autoDismiss(5);
//
//        return redirect()->route('panel.comment.index');
    }

    public function show(LandComment $comment)
    {
        //
    }

    public function edit(LandComment $comment)
    {
        return view('panel.landing.comment.edit', compact('comment'));
    }

    public function update(CommentRequest $request, LandComment $comment)
    {
        $comment->update($request->validated());

        Splade::toast(__('Updated'))->autoDismiss(5);

        return redirect()->route('panel.landing.comment.index');
    }

    public function destroy(LandComment $comment)
    {
        $comment->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

    public function publish(LandComment $comment)
    {
        $comment->update(['approved' => true]);

        Splade::toast(__('Published'))->autoDismiss(5)->info();

        return back();
    }

    public function hidden(LandComment $comment)
    {
        $comment->update(['approved' => false]);

        Splade::toast(__('Hided'))->autoDismiss(5)->warning();

        return back();
    }
}
