<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
class City extends Model
{
    use HasFactory;
    protected $table= 'cities';
    protected $primaryKey = 'City_ID';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'City_ID',
        'Country_ID',
        'City_Name_Ar',
        'City_Name_En',
    ];
    protected $appends = [
        'city_name' , 'country_name'
    ];
    protected $hidden = [
        'updated_at'
    ];

    public function getCityNameAttribute(){
        if(App::getLocale() =='ar'){
            return $this->City_Name_Ar;
        }else{
            return $this->City_Name_En;
        }
    }
    public function getCountryNameAttribute(){
        if(App::getLocale() =='ar' && $this->countries()){
            return $this->countries->Country_Name_Ar;
        }else{
            return $this->countries->Country_Name_En;
        }
    }
        public function countries(){
            return $this->belongsTo(Country::class, 'Country_ID');

      }
}
