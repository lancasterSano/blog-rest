<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const RULES = [
        'title' => 'required|max:255',
        'body' => 'required',
        'category_id' => 'required|exists:categories,id'
    ];

    protected $fillable = ['title', 'body', 'category_id'];
}
