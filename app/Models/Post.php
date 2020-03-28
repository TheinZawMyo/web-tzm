<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
class Post extends Model
{
    use CanBeLiked;
    protected $fillable = ['title','content'];
}
