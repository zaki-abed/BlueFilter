<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;
    protected $table = 'user_request';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'Request_ID';

    protected $fillable = [
        'Request_ID',
        'Request_Comment',
        'image',
        'User_ID',
        'Service_Provider_ID',
        'Request_Status'
    ];
    // relation
    public function user()
    {
        return $this->belongsTo(User::class, 'User_ID');
    }
    public function service_provider()
    {
        return $this->belongsTo(User::class, 'Service_Provider_ID');
    }
    public function response()
    {
        return $this->hasOne(ServiceProviderResponse::class, 'User_Request_ID', 'Request_ID');
    }
    protected $appends = [
        'status',
    ];
    //appends
    public function getStatusAttribute()
    {

        if ($this->Request_Status == 0) {
            return __('messages.response.status_pending');
        }
        elseif ($this->Request_Status == 1) {
            return __('messages.response.status_approve');
        } else {
            return __('messages.response.status_refused');
        }
    }

    public function getImageAttribute($value) 
    {
        return $value ? asset('storage/'. $value) : null;
    }
}
