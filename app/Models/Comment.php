<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=[ 'comment', 'star', 'approved', 'parent_id', 'user_id', 'commentable_id', 'commentable_type'];


    public function getApprovedAttribute($value)
    {
        return (bool)$value; // Convert a number 0 or 1 to false or true

    }
//    public function setApprovedAttribute($value)
//    {
//        return (bool)$value; // Convert a number 0 or 1 to false or true
//
//    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //public function product()
    //{
    //    return $this->belongsTo(Product::class);
    //}

    public function commentable()
    {
        return $this->morphTo();
    }

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }
}
