<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $timestamps = TRUE;
    protected $fillable = [
        'id',
        'user_id',
        "title",
        'content',
        "excerpt",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }   
}