<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        // Assuming you want to retrieve the post with the provided $id
        $post = Post::find($id);

        // Make sure to pass the correct variable name to the view
        return view('comments.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'comment'     => 'required|min:5',
        ]);

        //create post
        Comment::create([
            'post_id' => $request->post_id,
            'comment'   => $request->comment
        ]);

        //redirect to index
        return redirect()->route('index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //get post by ID
        $comments = Comment::findOrFail($id);

        //render view with post
        return view('comments.show', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get post by ID
        $comments = Comment::findOrFail($id);

        //render view with post
        return view('comments.edit', compact('comments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate form
        $this->validate($request, [
            'comment'     => 'required|min:5',
        ]);

        //get post by ID
        $comments = Comment::findOrFail($id);

        //update post with new image
        $comments->update([
            'comment'   => $request->comment
        ]);


        //redirect to index
        return redirect()->route('index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comments = Comment::findOrFail($id);

        //delete post
        $comments->delete();

        //redirect to index
        return redirect()->route('index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
