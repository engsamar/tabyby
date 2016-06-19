<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserRole;
use App\Post;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::orderBy('id', 'asc')->paginate(10);

		return view('posts.index', compact('posts'));
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function allPosts()
	{
		$doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
		$posts = Post::orderBy('id', 'asc')->paginate(3);

		return view('posts.posts', compact('posts','doctorRole'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$post = new Post();
		$user = Auth::user();
		$post->title = $request->input("title");
        $post->content = $request->input("content");
        $post->user_id = $user->id;
        $post->picture_path = $request->file("picture_path")->getClientOriginalName();

		$post->save();
		$request->file('picture_path')->move(public_path('images/posts/'), $request->file("picture_path")->getClientOriginalName() );

		return redirect()->route('posts.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::findOrFail($id);
		$doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
		
		if (Auth::user()->userRoles[0]->type==2) {
			# code...
		return view('posts.blog-detail', compact('post'));

		}else{
		return view('posts.show', compact('post','doctorRole'));

		}
	}
	public function blogDetail($id)
	{

		$doctorRole = UserRole::where('type', '=', 0)->firstOrFail();

		$post = Post::findOrFail($id);

//		if (Auth::user()->userRoles[0]->type==2) {
//			# code...
//		return view('posts.blog-detail', compact('post'));
//
//		}else{
		return view('posts.show', compact('post','doctorRole'));

//		}
	}
	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::findOrFail($id);

		return view('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$post = Post::findOrFail($id);

		$post->title = $request->input("title");
        $post->content = $request->input("content");
        $post->user_id = $request->input("user_id");
		$post->picture_path = $request->file("picture_path")->getClientOriginalName();
		$request->file('picture_path')->move(public_path('images/posts/'), $request->file("picture_path")->getClientOriginalName() );
		$post->save();
		$post->save();
		return redirect()->route('posts.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		$post->delete();

		return redirect()->route('posts.index')->with('message', 'Item deleted successfully.');
	}

}
