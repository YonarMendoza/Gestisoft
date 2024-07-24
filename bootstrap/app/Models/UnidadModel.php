<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadModel extends Model
{
    use HasFactory;
    protected $table = 'unidades';

    public function semoviente(){
        return $this->belongsTo('App\Models\SemovienteModel','Id_unidad','Id_unidad');
    }
}
