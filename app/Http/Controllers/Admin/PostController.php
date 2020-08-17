<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\PostServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Contracts\Encryption\DecryptException;

class PostController extends Controller
{
    private $postService;

    /**
     * Constructor
     */
    public function __construct(PostServiceInterface $postService)
    {
        $this->middleware('auth');
        $this->postService = $postService;
    }

    public function newPost()
    {
        return view('admin.new_post');
    }

    /**
     * save post
     */
    public function savePost(Request $request)
    {
        $validator = $this->validatePost($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->postService->savePost($request);
        return redirect()->route('home');
    }


    /**
     * update post view form
     */
    public function editPost($id)
    {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            // $e->getMessage();
            return redirect()->route('home');
        }
        $updatePostData = $this->postService->getPostById($id);
        return view('admin.update_post', compact('updatePostData'));
    }

    /**
     * update post using id by authorized user
     */
    public function updatePost(Request $request,$id)
    {
        $validator = $this->validatePost($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->postService->updatePost($request,$id);
        return redirect()->route('home');
    }

    public function deletePost($id)
    {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            // $e->getMessage();
            return redirect()->route('home');
        }
        $this->postService->deletePost($id);
        return redirect()->route('home');

    }




    /**
     * validate post
     */
    public function validatePost(Request $request)
    {
        $rules = [
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
        ];
        return Validator::make($request->all(), $rules);
    }
}
