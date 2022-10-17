<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProviderResponse extends Model
{
    use HasFactory;
    protected $table= 'service_provider_response';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Response_ID',
        'Response_Comment',

        'Service_Provider_ID',
        'User_Request_ID',
    ];

    protected $hidden = [
        'updated_at',
    ];
    // relation
    public function userrequest()
    {
        return $this->belongsTo(UserRequest::class,'User_Request_ID' , 'Request_ID');
    }
    public function service_provider(){
        return $this->belongsTo(User::class , 'Service_Provider_ID');
    }

}
