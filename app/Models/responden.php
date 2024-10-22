<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class responden extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function response(){
        return $this->hasMany(response::class);
    }

    public function feedback(){
        return $this->hasMany(feedback::class);
    }
}
