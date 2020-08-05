<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Admin\Obj\CRUDFile;

class CommentController extends Controller
{

    /**
     * @var CRUDFile
     */
    private $crud;

    public function __construct()
    {
        $this->crud = new CRUDFile('comment', Comment::class);
    }

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
        $comments = $this->crud->index();
        return view('admin.comments.index', compact('comments'));
    }


    public function show($id)
    {
        $comment = $this->crud->show($id);
        return view('admin.comments.show', compact('comment'));
    }


    public function edit($id)
    {
        $comment = $this->crud->edit($id);
        return view('admin.comments.edit', compact('comment'));
    }


    public function update(Request $request, $id)
    {
        $this->crud->update_file($request, $id, ['avatar']);
        return redirect()->route('admin.comments.index');
    }


    public function destroy($id)
    {
        $this->crud->destroy($id);
        return redirect()->route('admin.comments.index');
    }

    public function massDestroy(Request $request)
    {
        $this->crud->massDestroy($request);
    }


    public function restore($id)
    {
        $this->crud->restore($id);
        return redirect()->route('admin.comments.index');
    }


    public function perma_del($id)
    {
        $this->crud->perma_del_file($id, ['avatar']);
        return redirect()->route('admin.comments.index');
    }
}
