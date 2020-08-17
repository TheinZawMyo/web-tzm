<?php
namespace App\Dao;

use App\Contracts\Dao\ProfileDaoInterface;
use App\Models\Post;
use App\User;

class ProfileDao implements ProfileDaoInterface
{
    public function getProfile(){
        return User::select('users.*')
                ->where('id', auth()->user()->id)
                ->first();
    }

    public function updateProfile($request, $id){
        User::where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'about' => $request->about,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
    }
}