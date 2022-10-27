<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Season;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
        'season_id',
        'brand_id',
    ];

    public function category() {
        return $this->BelongsTo(Category::class);
    }

    public function season() {
        return $this->BelongsTo(Season::class);
    }

    public function brand() {
        return $this->BelongsTo(Brand::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }


}
