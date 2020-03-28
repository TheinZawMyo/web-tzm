<?php

namespace App\Services;

use App\Contracts\Dao\PostDaoInterface;
use App\Contracts\Services\PostServiceInterface;
use Illuminate\Support\Str;

class PostService implements PostServiceInterface
{
    private $PostDao;

    /**
     * Constructor
     *
     * @param PostDaoInterface $PostDao
     */
    public function __construct(PostDaoInterface $PostDao)
    {
        $this->PostDao = $PostDao;
    }

    public function savePost($request)
    {
        $this->PostDao->savePost($request);
    }

    public function getAllPosts()
    {
        return $this->PostDao->getAllPosts();
    }

    public function getMyPost()
    {
        return $this->PostDao->getMyPost();
    }

    public function getWebPost()
    {
        return $this->PostDao->getWebPost();
    }

    public function getFramePost()
    {
        return $this->PostDao->getFramePost();
    }

    public function getProgramPost()
    {
        return $this->PostDao->getProgramPost();
    }

    public function getKnowPost()
    {
        return $this->PostDao->getKnowPost();
    }

    public function getPostDetail($id)
    {
        return $this->PostDao->getPostDetail($id);
    }

    public function getPrevious($id)
    {
        return $this->PostDao->getPrevious($id);
    }

    public function getNext($id)
    {
        return $this->PostDao->getNext($id);
    }

    public function updateView($view_count, $id)
    {
        return $this->PostDao->updateView($view_count, $id);
    }
}
