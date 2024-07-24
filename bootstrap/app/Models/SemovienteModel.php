<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemovienteModel extends Model
{
    use HasFactory;
    protected $table = 'semovientes';

    public function raza(){
        return $this->belongsTo('App\Models\RazaModel','Id_raza','Id_raza');
    }

    public function unidad(){
        return $this->belongsTo('App\Models\UnidadModel','Id_unidad','Id_unidad');
    }

    public function novedad(){
        return $this->belongsTo('App\Models\NovedadModel','Id_semoviente','Id_semoviente');
    }
}
