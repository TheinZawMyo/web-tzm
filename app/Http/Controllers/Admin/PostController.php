<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\PostServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

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
