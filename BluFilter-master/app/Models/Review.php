<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function request() {
        return $this->belongsTo(UserRequest::class, 'User_Request_ID' , 'Request_ID');
    }
}
