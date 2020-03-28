<?php

namespace App\Http\Controllers;

use App\Contracts\Services\PostServiceInterface;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $myPost = $this->postService->getMyPost();
        return view('admin.dashboard', compact('myPost'));
    }

    public function profile()
    {
        return view('admin.profile');
    }

}
