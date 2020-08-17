<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\ProfileServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Contracts\Encryption\DecryptException;

class ProfileController extends Controller
{
    private $profileService;

    /**
     * Constructor
     */
    public function __construct(ProfileServiceInterface $profileService)
    {
        $this->middleware('auth');
        $this->profileService = $profileService;
    }

    public function profile()
    {
        $profile = $this->profileService->getProfile();
        return view('admin.profile', compact('profile'));
    }

    public function updateProfile(Request $request, $id){
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->route('home');
        }
        $validator = $this->validateProfile($request);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $this->profileService->updateProfile($request, $id);
        return redirect()->route('profile');
    }

    public function validateProfile(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required | email'
        ];
        return Validator::make($request->all(), $rules);
    }



}
