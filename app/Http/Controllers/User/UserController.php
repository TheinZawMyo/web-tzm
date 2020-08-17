<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\PostServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\Post;
use Session;
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
        $mostRead = $this->postService->getMostRead();
        return view('index', compact(['allPost', 'mostRead']));
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
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            // $e->getMessage();
            return redirect()->route('index');
        }

        $Key = 'blog' . $id;
        // dd($Key);
        if (!Session::has($Key)) {
 
            Post::where('post_id', $id)
                ->increment('view', 1);
            Session::put($Key, 1);
        }

        $previous = $this->postService->getPrevious($id);
        $next = $this->postService->getNext($id);
        $detail = $this->postService->getPostDetail($id);
        return view('user.blog_post', compact(['detail', 'previous', 'next']));
    }

    // public function liking($id){
    //     $detail = $this->postService->getPostDetail($id);
    //     $view_count = $detail['view'] + 1;
    //     $this->postService->updateView($view_count, $id);
    //     return redirect()->route('details');
    // }
}
