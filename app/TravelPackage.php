<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPackage extends Model
{
    use SoftDeletes;

    protected $table = 'travel_packages';

    protected $fillable = [
        'title', 'slug', 'location', 'about', 'featured_event', 'foods', 'language', 'departure_date',  'durations', 'type', 'price'
    ];

    public function galleries(){
        return $this->hasMany(Gallery::class, 'travel_packages_id', 'id');
    }


    public function transaction(){
        return $this->hasMany(Transaction::class, 'travel_packages_id', 'id');
    }



}
