<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NovedadModel extends Model
{
    use HasFactory;
    protected $table = 'novedad';

    public function semoviente(){
        return $this->belongsTo('App\Models\SemovienteModel','Id_semoviente','Id_semoviente');
    }

}
