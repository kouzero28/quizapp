<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Validator;

class ShareController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quiz' => 'required|max:1000',
            'hint' => 'required|max:1000',
            'answer' => 'required|max:1000',
        ]);

        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/share')
                ->withInput()
                ->withErrors($validator);
        }

        $user = Auth::user();

        //以下に登録処理を記述（Eloquentモデル）
        $posts = new Post;
        $posts->quiz = $request->quiz;
        $posts->hint = $request->hint;
        $posts->answer = $request->answer;
        $posts->user_id = Auth::id(); //ここでログインしているユーザidを登録しています
        $posts->user_name = $user->name;
        $posts->save();




        return redirect('share')->with('message', 'Share OK!');
    }

    public function index()
    {
        $posts = Post::get();
        $user = Post::get();


        return view('share', [
            'posts' => $posts
        ]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
