<?php

namespace App\Http\Controllers;

use App\Comment;
// use App\User;
// use App\Post;
use Illuminate\Http\Request;
// use Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
            'name' => 'required',
        ]);
        

        $comment = new Comment();
        $comment->name = $request->get('name');
        $comment->comment = $request->get('comment');
        $comment->avatar = $request->get('avatar');

        $comment->disAllow();
        

        
        // Comment::mailNotification($comment);

        // dd($comment->user_id);
        $comment->save();

        return redirect()->back()->with('status', 'Спасибо. Ваш комментарий скоро будет опубликован.');
    }
}
