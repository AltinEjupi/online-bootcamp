<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model ;

class Professor extends Model
{
    public $timestamps = false;

    public function courses(){
        return $this->hasMany(Course::class);
    }
}