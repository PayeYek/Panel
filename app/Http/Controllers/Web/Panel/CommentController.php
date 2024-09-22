<?php

namespace App\Http\Controllers\Web\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\CommentRequest;
use App\Models\Comment;
use App\Tables\Comments;
use Splade;

class CommentController extends Controller
{

    public function index()
    {
        return view('panel.comment.index', [
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

    public function show(Comment $comment)
    {
        //
    }

    public function edit(Comment $comment)
    {
        //$products = LandProduct::latest()->pluck('title','id');

        return view('panel.comment.edit', compact('comment'));
    }

    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());

        Splade::toast(__('Updated'))->autoDismiss(5);

        return redirect()->route('panel.comment.index');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

    public function publish(Comment $comment)
    {
        $comment->update(['approved' => true]);

        Splade::toast(__('Published'))->autoDismiss(5)->info();

        return back();
    }

    public function hidden(Comment $comment)
    {
        $comment->update(['approved' => false]);

        Splade::toast(__('Hided'))->autoDismiss(5)->warning();

        return back();
    }
}
