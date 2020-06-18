<?php

namespace App\Http\Controllers;

use App\Comment;
// use App\User;
// use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTraitUser;
// use Symfony\Component\HttpFoundation\File\UploadedFile; // для второго варианта

// use Auth;

class CommentController extends Controller
{
    use FileUploadTraitUser;
    
    

    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|string|max:5000',
            'name' => 'required|string|max:255',
            'avatar' => 'mimes:png,jpg,jpeg,gif',
        ]);
        

        $request = $this->saveFiles($request);
        $comment = Comment::create($request->all());

        // dd($comment->date = date('Y-m-d'));
        // $comment->date = date('Y-m-d');
        // $comment->date = date('d/m/Y');
        // $comment->save();
        
            // Второй вариант загрузки файла
        // $image = $request->file('avatar');
        // $avatarName = $image->getClientOriginalName();
        // $image->move(public_path('img/comments/avatar'), $avatarName);

        // $comment = new Comment();
        // $comment->name = $request->get('name');
        // $comment->comment = $request->get('comment');
        // $comment->avatar = $avatarName;
        // $comment->save();

        return redirect()->back()->with('status', 'Спасибо. Ваш комментарий скоро будет опубликован.');
        // return response()->json(['name' => 'Abigail', 'state' => 'CA']);
    }
}
