<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;
class Comment extends Model
{
    use HasFactory;
    public $timestamps=true;

    protected $fillable = [
        'id','author_id','recipe_id','content','date',
    ];
    public function author()
    {
        return $this->belongsTo(App\Models\User::class,'author_id');
    }
    public function recipe()
    {
        return $this->belongsTo(App\Models\Recipe::class,'recipe_id');
    }
}
