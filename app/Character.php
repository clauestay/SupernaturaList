<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'name', 'slug', 'except', 'body', 'status', 'file'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function seasons(){
        return $this->belongsToMany(Season::class);
    }
}
