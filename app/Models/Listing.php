<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    /** @use HasFactory<\Database\Factories\ListingFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'listing_category_id',
        'title',
        'description',
        'price',
        'is_active',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(ListingCategory::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }
}
