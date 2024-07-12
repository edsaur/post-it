<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $posts = Post::with('user')->where('user_id', $user->id)->get();
        return view('dashboard.dashboard', ['posts' => $posts]);
    }

    public function addContributor(Request $request, Post $post, User $user) {
        // This will search the model for user to contribute to his own task

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // VALIDATE THE form
        $data = $request->validate([
            'title' => 'required|min:10|max:50',
            'description' => 'nullable|string'
        ]);

        $data['user_id'] = auth()->id();

        $post = Post::create($data);

        return redirect()->route('post.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if($post->user_id !== auth()->id()){
            return redirect()->route('post.dashboard')->with('error', "You are not authorized to view this!");
        }
        $tags = ['Not Done', 'Currently Working', 'Done'];
        return view('dashboard.posts', ['post' => $post, 'tags' => $tags]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if($request->input('tags')){
           $data = $request->validate([
            'tags' => 'required|in:Not Done,Currently Working,Done'
           ]);
           $post->update($data);
           return back()->with('message', 'Updated task successfully');
        }

        $data = $request->validate([
            'title' => 'required|min:10|max:50',
            'description' => 'nullable'
        ]);

        $post->update($data);
        return redirect()->route('post.show', $post->id)->with('success', 'Updated task successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.dashboard')->with('success', 'Successfully deleted!');
    }


}
