<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $validationRules = [
        'title' => 'min:3|max:255|required|unique:posts,title',
        'post_content' => 'min:5|required',
        'post_image' => 'active_url',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts= Post::where('user_id', Auth::id())->get();
        $posts = Auth::user()->posts;
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories= Category::all();
        return view ('admin.posts.create', ['post'=> $post, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);

        $data = $request->all();

        $data['user_id'] = Auth::id();
        $data['post_date'] = new DateTime();

        Post::create($data);
        return redirect()->route('admin.posts.index')->with('success', 'The post ' .$data["title"] . ' has been created successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show',  compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories= Category::all();
        return view ('admin.posts.edit', ['pơst' =>$post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->validationRules);

        $post = Post::findOrFail($id);
        $data = $request->all();

        $data['user_id'] = Auth::id();
        $data['post_date'] = $post->post_date;

        $post->update($data);
        return redirect()->route('admin.posts.index', ['id' => $post->id])->with('success', 'The post ' .$data["title"] . ' has been modified successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post -> delete();

        return redirect()->route('admin.posts.index')->with('deleted', 'The post ' . $post->title . '  has been deleted successfully');
    }

      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function clearCategory($id){
        $post = Post::findOrFail($id);
        $category_id= $post->category_id;
        $post->category_id = null;
        $post->save();

        return redirect()->route('admin.categories.show', $category_id);
    }
}
