<?php

namespace App\Contracts\Services;

interface ProfileServiceInterface
{
    public function getProfile();
    public function updateProfile($request, $id);
}