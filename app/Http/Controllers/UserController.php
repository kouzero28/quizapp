<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;  //モデルと接続 
use Illuminate\Support\Facades\DB;  //追記
use App\Post;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = Auth::user();

        //$posts = Post::get()->sortByDesc("id");

        $posts = Post::where('user_id', $users->id) //$userによる投稿を取得
            ->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
            ->paginate(10);

        $user_id = Auth::id();

        return view('user', [
            'posts' => $posts,
            'users' => $users,
            'user_id' => $user_id
        ]);
    }


    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('/user')->with('message', 'Delete OK');
    }

    public function edit($id)
    {
        #レコードをidで指定
        $posts = Post::findOrFail($id);

        #viewに連想配列を渡す
        return view('edit', [
            'posts' => $posts
        ]);
    }

    public function update(Request $request, $id)
    {

        $posts = Post::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'quiz' => 'required|max:1000',
            'hint' => 'required|max:1000',
            'answer' => 'required|max:1000',
        ]);

        //バリデーション:エラー
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }


        $posts = Post::findOrFail($id);
        $posts->quiz = $request->input('quiz');
        $posts->hint = $request->input('hint');
        $posts->answer = $request->input('answer');
        $posts->save();
        #return redirect('greeting',['status' => 'UPDATE完了！']);　←error!
        return redirect('user')->with('message', 'Edit OK!');
    }

    public function user_edit()
    {
        #レコードをidで指定
        $user = Auth::user();
        return view('user_edit', ['user' => $user]);
    }

    public function user_update(Request $request, $id)
    {

        $user = Auth::user();


        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        //バリデーション:エラー
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }

        $user->name = $request->input('name');
        $user->save();
        #return redirect('greeting',['status' => 'UPDATE完了！']);　←error!
        return redirect('user')->with('message', 'Edit OK!');
    }

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }

    public function like($id)
    {
        Like::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
        ]);

        session()->flash('success', 'You Liked the Reply.');

        return redirect()->back();
    }

    public function unlike($id)
    {
        $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();

        session()->flash('success', 'You Unliked the Reply.');

        return redirect()->back();
    }

    //public function __construct(){
    //$this->middleware('auth');
    //}

}
