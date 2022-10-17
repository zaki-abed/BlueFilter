<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'title',
        'body',
        'brief',
        'video_link',
        'featured_image',
        'user_id',
        'lang'
    ]; 

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getFeaturedImageAttribute($value){
        return asset($value ? 'storage/images/'. $value : 'images/articale.png');
    }

    public function getFeaturedImageThumbnailAttribute() {
        if($this->attributes['featured_image']) {
            return asset('storage/images/thumbnails/' . $this->attributes['featured_image']);
        }
        return null;
    }
    
    public function getVideoEmbedAttribute() {
        return Str::contains($this->video_link, 'youtu.be')
        ? 'https://www.youtube.com/embed/' .  substr($this->video_link, strrpos($this->video_link, '/') + 1)
        : '';
    }
}
