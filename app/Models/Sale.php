<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function asset(){
        return $this->belongsToMany('App\Models\Asset');
    }
}
