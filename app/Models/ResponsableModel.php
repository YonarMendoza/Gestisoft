<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsableModel extends Model
{
    use HasFactory;
    protected $table = 'responsables';
    
    public function novedad(){
        return $this->belongsTo('App\Models\NovedadModel','Id_responsable','Id_responsable');
    }
}
