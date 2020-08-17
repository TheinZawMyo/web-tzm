<?php

namespace App\Contracts\Dao;

interface ProfileDaoInterface
{
    public function getProfile();
    public function updateProfile($request, $id);
}