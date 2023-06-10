<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    public $table='genero';

    use HasFactory;
    public function Libro(){
        return $this->hasMany('App\Models\Libro');
    }
}
