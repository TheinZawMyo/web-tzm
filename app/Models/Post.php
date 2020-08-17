<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Hashids\Hasids\Facades\Hashids;
class Post extends Model
{
    use CanBeLiked;
    protected $fillable = ['title','content'];
}
