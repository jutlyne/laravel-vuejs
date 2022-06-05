<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
        'sort_detail',
        'images',
        'category_id',
    ];
    
    public function category() {
        return $this->belongsTo(Category::class); // don't forget to add your full namespace
    }
}
