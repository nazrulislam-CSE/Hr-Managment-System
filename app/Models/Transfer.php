<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function banking(){
        return $this->belongsTo(Banking::class,'banking_id','id');
    }
    // public function banking(){
    //     return $this->belongsTo('App\Models\Banking');
    // }
}
