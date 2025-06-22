<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image',
        'recommend_flag',
        'carriage_flag',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function getAverageRatingAttribute()
    {
        $avg = $this->reviews()->avg('score');
        if($avg === null) {
            return 0;
        }

        return round($avg * 2) / 2;
    }

    public function favorite_uusers() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
