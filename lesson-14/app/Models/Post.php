<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait CommentTrait
{

    public function comments(){
        return $this->morphMany(Comment::class);
    }
}

class Post extends Model
{
    use HasFactory;
    use CommentTrait;
    protected $fillable = ['title','body','created_at','id'];
}
