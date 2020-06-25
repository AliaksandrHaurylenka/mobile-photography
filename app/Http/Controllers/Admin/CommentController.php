<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FileUploadTraitUser;

class CommentController extends Controller
{

    use FileUploadTraitUser;

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
            $comments = Comment::select(['id', 'name', 'avatar', 'comment', 'status'])->latest()->get();
        }

        return view('admin.comments.index', compact('comments'));
    }

    
    public function show($id)
    {
        if (! Gate::allows('comment_view')) {
            return abort(401);
        }
        $comment = Comment::findOrFail($id);

        return view('admin.comments.show', compact('comment'));
    }

    
    public function edit($id)
    {
        if (! Gate::allows('comment_edit')) {
            return abort(401);
        }
        $comment = Comment::findOrFail($id);

        return view('admin.comments.edit', compact('comment'));
    }

    
    public function update(Request $request, $id)
    {
        if (! Gate::allows('comment_edit')) {
            return abort(401);
        }
        $comment = Comment::findOrFail($id);
        if($_FILES['avatar']['name']){
            $request = $this->saveFiles($request);
            $comment->removeImg();
        }
        $comment->update($request->all());

        return redirect()->route('admin.comments.index');
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
