<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function responden(){
        return $this->belongsTo(responden::class);
    }
}
