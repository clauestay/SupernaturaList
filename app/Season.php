<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];
    
    public function characters(){
        return $this->belongsToMany(Character::class);
    }
}
