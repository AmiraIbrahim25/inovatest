<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;

class Review extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'review',
        'post_id',

    ];

    protected $hidden=['deleted_at','updated_at'];

  
    public function post(){
        return $this->belongsTo(Post::class,'post_id');
    }
}