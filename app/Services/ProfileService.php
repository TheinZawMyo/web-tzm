<?php

namespace App\Services;

use App\Contracts\Dao\ProfileDaoInterface;
use App\Contracts\Services\ProfileServiceInterface;
use Illuminate\Support\Str;

class ProfileService implements ProfileServiceInterface
{
    private $profileDao;

    /**
     * Constructor
     *
     * @param PostDaoInterface $PostDao
     */
    public function __construct(ProfileDaoInterface $profileDao)
    {
        $this->profileDao = $profileDao;
    }

    public function getProfile(){
        return $this->profileDao->getProfile();
    }

    public function updateProfile($request, $id){
        $this->profileDao->updateProfile($request, $id);
    }
}