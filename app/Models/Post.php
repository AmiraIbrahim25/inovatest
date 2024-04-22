<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Comment;
use App\Models\Rate;

class Post extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'user_id',

    ];

    protected $hidden=['deleted_at','updated_at'];

   
    // relations
    public function comment(){
        return $this->HasMany(Comment::class);
    }
    public function rate(){
        return $this->HasMany(Rate::class);
    }
    public function review(){
        return $this->HasMany(Review::class);
    }
    // relations
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
