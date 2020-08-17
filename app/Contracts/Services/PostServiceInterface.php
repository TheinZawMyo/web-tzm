<?php

namespace App\Contracts\Services;

interface PostServiceInterface
{
    public function savePost($request);
    public function getMyPost();
    public function getAllPosts();
    public function getWebPost();
    public function getFramePost();
    public function getProgramPost();
    public function getKnowPost();
    public function getPostDetail($id);
    public function getPrevious($id);
    public function getNext($id);
    public function updateView($view_count, $id);
    public function getPostById($id);
    public function updatePost($request, $id);
    public function deletePost($id);
    public function getMostRead();
}
