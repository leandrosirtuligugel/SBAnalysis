<?php

namespace SBAnalysis\Models;

use Illuminate\Database\Eloquent\Model;

class GestorSistemaModel extends Model
{
    protected $table = 'gestorsistema';
    protected $primaryKey = 'codigogestorsistema';
    public $timestamps = false;

    protected $fillable = ['codigogestorsistema', 'codigogestor', 'codigosistema'];

    public function sistema(){

    	return $this->belongsTo('SBAnalysis\Models\SistemaModel', 'codigosistema');
    }
}
