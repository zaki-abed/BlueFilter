<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
class Country extends Model
{
    use HasFactory;
    protected $table= 'countries';
    protected $primaryKey = 'Country_ID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'Country_ID',
        'Country_Name_En',
        'Country_Name_Ar',
    ];
    protected $appends = [
        'country_name'
    ];
      protected $hidden = [
        'updated_at'
    ];

    public function getCountryNameAttribute(){
        if(App::getLocale() =='ar'){
            return $this->Country_Name_Ar;
        }else{
            return $this->Country_Name_En;
        }
    }
    public function city(){
        return $this->hasMany(City::class , 'Country_ID' , 'Country_ID');
    }

}
