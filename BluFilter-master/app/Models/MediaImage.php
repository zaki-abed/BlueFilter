<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MediaImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename'
    ];

    public function getFilenameAttribute($value){
        return asset('storage/images/'. $value);
    }

    public function delete() {
        Storage::delete('storage/images/'.$this->attributes['filename']);
        Storage::delete('storage/images/thumbnails/'.$this->attributes['filename']);

        return parent::delete();
    }

    public function getRawFileNameAttribute() {
        return $this->attributes['filename'];
    }
}
