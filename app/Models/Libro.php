<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    public $table='libro';

    use HasFactory;
    public function prestamo(){
        return $this->hasMany('App\Models\Prestamo');
    }
}
