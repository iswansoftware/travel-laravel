<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $table = 'galleries';

    protected $fillable = [
        'travel_packages_id', 'image'
    ];

    public function travel_package(){
        return $this->belongsTo(TravelPackage::class , 'travel_packages_id', 'id');
    }

    public function transaction(){
        return $this->hasMany(Transaction::class, 'transaction_id', 'id');
    }





}
