<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    /**
     * Get the user that authored the recipe.
     */
    public $timestamps=false;

    public function author()
    {
        return $this->belongsTo(App\Models\User::class,'author_id');
    }
    public function comments()
    {
        return $this->hasMany(App\Models\Comment::class,'recipe_id');
    }
    protected $fillable = [
        'id','author_id','title','content','ingredients','url','date','status','image_path'
    ];

}
