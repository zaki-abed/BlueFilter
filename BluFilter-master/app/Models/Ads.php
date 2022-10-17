<?php

namespace App\Models;
use App\Models\User;    
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Ads extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'body', 'featured_image', 'published' , 'brief'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->diffForHumans();
    }
    public function getFeaturedImageThumbnailAttribute() {
        if($this->attributes['featured_image']) {
            return asset('storage/images/' . $this->attributes['featured_image']);
        }
        return null;
    }
    public function getFeaturedImageAttribute($value){
        return asset($value ? 'storage/images/'. $value : 'images/articale.png');
    }

    
    
}
