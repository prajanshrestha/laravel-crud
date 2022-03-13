<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function addPost() {
        return view("addPost");
    }

    public function createPost(Request $request) {
        $post = new Post(); 
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return back()->with("postCreated", "Post has been created successfully.");
    }

    public function getPost() {
        $posts = Post::orderBy("id", "DESC")->get();
        return view("posts", compact("posts"));
    }

    public function getPostById($id) {
        $post = Post::where("id", $id)->first();
        return view("singlePost", compact("post"));
    }

    public function deletePost($id) {
        Post::where("id", $id)->delete();
        return back()->with("postDeleted", "Post has been deleted successfully.");
    }

    public function editPost($id) {
        $post = Post::find($id);
        return view("editPost", compact("post", "id"));
    }

    public function updatePost(Request $request) {
        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return back()->with("postUpdated", "Post has been updated successfully.");
    }
}