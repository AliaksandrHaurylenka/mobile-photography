<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function toggle($id)
    {
        $comment = Comment::find($id);
        $comment->toggleStatus();

        // Comment::mailNotification($comment);
        // Subscribe::mailNotificationComment($comment);

        return redirect()->back();
    }
    
    public function index()
    {
        if (! Gate::allows('comment_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('comment_delete')) {
                return abort(401);
            }
            $comments = Comment::onlyTrashed()->get();
        } else {
            // $comments = Comment::all();
            $comments = Comment::select(['id', 'name', 'avatar', 'comment'])->latest()->get();;
        }

        return view('admin.comments.index', compact('comments'));
    }

    
    public function show(Comment $comment)
    {
        //
    }

    
    public function edit(Comment $comment)
    {
        //
    }

    
    public function update(Request $request, Comment $comment)
    {
        //
    }

    
    public function destroy($id)
    {
        if (! Gate::allows('comment_delete')) {
            return abort(401);
        }
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('admin.comments.index');
    }

    public function massDestroy(Request $request)
    {
        if (! Gate::allows('comment_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Comment::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    
    public function restore($id)
    {
        if (! Gate::allows('comment_delete')) {
            return abort(401);
        }
        $comment = Comment::onlyTrashed()->findOrFail($id);
        $comment->restore();

        return redirect()->route('admin.comments.index');
    }

   
    public function perma_del($id)
    {
        if (! Gate::allows('comment_delete')) {
            return abort(401);
        }
        $comment = Comment::onlyTrashed()->findOrFail($id);
        $comment->forceDelete();
        $comment->remove();

        return redirect()->route('admin.comments.index');
    }
}
