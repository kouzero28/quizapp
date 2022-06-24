<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Like;

class PostsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $posts = Post::get()->sortByDesc("id");

    $user_id = Auth::id();

    return view('main', [
      'posts' => $posts,
      'user_id' => $user_id
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete($id)
  {
    \DB::table('posts')
      ->where('id', $id)
      ->delete();
    return redirect('/main');
  }

  public function __construct()
  {
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
}
