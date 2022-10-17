<?php

namespace App\Models;

use App;
use Hash;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements HasLocalePreference
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'locale',
        'profile_image',
        'phone',
        'longitude',
        'latitude',
        'bio',
        'firebase_token',
        'address',
        'City',
        'password_confirmation',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $appends = [
        'city_name',
    ];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'notification' => 'string',
        'longitude' => 'string',
        'latitude' => 'string',
    ];

    public function preferredLocale()
    {
        return $this->locale;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function queries()
    {
        return $this->hasMany(ContactQuery::class);
    }

    public function incomingRequests()
    {
        return $this->hasMany(UserRequest::class, 'Service_Provider_ID');
    }

    //check user type
    public function is($type): bool
    {
        return $this->type === $type;
    }

    public function scopeServiceProvider($q)
    {
        return $q->has('categories');
    }

    public function isServiceProvider(): bool
    {
        return $this->categories()->exists();
    }

    public function views()
    {
        return $this->hasOne(ServiceProviderClicks::class, 'service_provider_id') ?? null;
    }

    public function citty()
    {
        return $this->belongsTo(City::class, 'City', 'City_ID');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    public function loginHistory()
    {
        return $this->hasMany(LoginHistory::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getProfileThumbnailAttribute()
    {
        if (array_key_exists('profile_image', $this->attributes)) {
            return asset('storage/images/thumbnails/' . $this->attributes['profile_image']);
        }
        return null;
    }

    public function getProfileImageAttribute($value)
    {
        // if (array_key_exists('profile_image', $this->attributes)) {
        //     return asset('storage/images/' . $value);
        // }
        // return null;

        return asset($value ? 'storage/images/' . $value : 'images/avatar.png');
    }

    public function getCityNameAttribute($value)
    {
        if (App()->getLocale() == 'ar' && $this->citty) {
            return $this->citty->City_Name_Ar;
        } else if ($this->citty) {
            return $this->citty->City_Name_En;
        }
    }

    public function getClicksAttribute()
    {
        return $this->views->click_count ?? 0;
    }

    public function getRatingAvgAttribute()
    {
        $ids = $this->incomingRequests()->where('Request_Status', 1)->pluck('Request_ID');
        return Review::whereIn('User_Request_ID', $ids)->avg('rating');
    }

    public function delete()
    {
        $this->pages()->delete();

        $this->categories()->detach();

        $this->views()->delete();

        $this->posts()->delete();

        // $this->queries()->delete();

        $this->loginHistory()->delete();

        return parent::delete();
    }
}
