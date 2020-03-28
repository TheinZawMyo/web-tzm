<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\PostServiceInterface;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    private $postService;

    /**
     * Constructor
     */
    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $allPost = $this->postService->getAllPosts();
        return view('index', compact('allPost'));
    }

    public function webDesign()
    {
        $webPost = $this->postService->getWebPost();
        return view('user.web_design', compact('webPost'));
    }

    public function framework()
    {
        $framePost = $this->postService->getFramePost();
        return view('user.framework', compact('framePost'));
    }

    public function programming()
    {
        $programPost = $this->postService->getProgramPost();
        return view('user.programming', compact('programPost'));
    }

    public function knowledge()
    {
        $knowPost = $this->postService->getKnowPost();
        return view('user.knowledge', compact('knowPost'));
    }

    public function details($id)
    {

        $previous = $this->postService->getPrevious($id);
        $next = $this->postService->getNext($id);
        $detail = $this->postService->getPostDetail($id);
        $view_count = $detail['view'] + 1;
        // $clientIP = request()->ip();
        // $this->postService->updateView($view_count, $id);
        return view('user.blog_post', compact(['detail', 'previous', 'next']));
    }
}
