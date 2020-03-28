<?php
namespace App\Dao;

use App\Contracts\Dao\PostDaoInterface;
use App\Models\Post;
use App\User;

class PostDao implements PostDaoInterface
{

    public function savePost($request)
    {
        Post::insert([
            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
            'created_at' => date('Y-m-d H:i:s'),
            'user_id' => auth()->user()->id,
        ]);
    }

    public function getMyPost()
    {
        return Post::select('posts.*')
            ->where('posts.user_id', auth()->user()->id)
            ->paginate(6);
    }

    public function getAllPosts()
    {
        return Post::select('posts.*', 'users.name')
            ->join('users', 'posts.user_id', 'users.id')
            ->orderBy('post_id', 'desc')
            ->paginate(6);
    }

    public function getWebPost()
    {
        return Post::select('posts.*', 'users.name')
            ->join('users', 'posts.user_id', 'users.id')
            ->where('category', 'Web Design')
            ->orderBy('post_id', 'desc')
            ->paginate(9);
    }
    public function getFramePost()
    {
        return Post::select('posts.*', 'users.name')
            ->join('users', 'posts.user_id', 'users.id')
            ->where('category', 'Framework')
            ->orderBy('post_id', 'desc')
            ->paginate(9);
    }
    public function getProgramPost()
    {
        return Post::select('posts.*', 'users.name')
            ->join('users', 'posts.user_id', 'users.id')
            ->where('category', 'Programming')
            ->orderBy('post_id', 'desc')
            ->paginate(9);
    }
    public function getKnowPost()
    {
        return Post::select('posts.*', 'users.name')
            ->join('users', 'posts.user_id', 'users.id')
            ->where('category', 'Knowledge')
            ->orderBy('post_id', 'desc')
            ->paginate(9);
    }
    public function getPostDetail($id)
    {
        return Post::select('posts.*', 'users.name')
            ->join('users', 'posts.user_id', 'users.id')
            ->where('post_id', $id)
            ->first();
    }

    public function getPrevious($id)
    {
        return Post::select('posts.*', 'users.name')
            ->join('users', 'posts.user_id', 'users.id')
            ->where('post_id', '<', $id)
            ->orderBy('post_id', 'desc')
            ->first();
    }

    public function getNext($id)
    {
        return Post::select('posts.*', 'users.name')
            ->join('users', 'posts.user_id', 'users.id')
            ->where('post_id', '>', $id)
            ->orderBy('post_id')
            ->first();
    }

    public function updateView($view_count, $id)
    {
        Post::where('post_id', $id)
            ->update([
                'view' => $view_count,
                'updated_at' => null,
            ]);
    }

}
