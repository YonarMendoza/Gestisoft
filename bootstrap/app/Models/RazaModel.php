<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RazaModel extends Model
{
    use HasFactory;
    protected $table = 'razas';

    public function semoviente(){
        return $this->belongsTo('App\Models\SemovienteModel','Id_raza','Id_raza');
    }
}
