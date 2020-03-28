<?php

namespace App\Contracts\Dao;

interface PostDaoInterface
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
}
