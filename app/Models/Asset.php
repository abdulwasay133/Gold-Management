<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $guarded = [];
    use HasFactory;
    
    public function sale(){
        return $this->hasMany('App\Models\Sale');
    }

    public function stock(){
        return $this->hasMany('App\Models\Stock');
    }

   
}
