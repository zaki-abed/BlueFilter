<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'brief',
        'body',
        'featured_image',
        'published',
        'user_id',
        'lang'
    ];

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getFeaturedImageAttribute($value){
        return asset('storage/images/'. $value);
    }
}
