<?php

namespace SBAnalysis\Models;

use Illuminate\Database\Eloquent\Model;

class GestorModel extends Model
{
    protected $table = 'gestor';
    protected $primaryKey = 'codigogestor';
    public $timestamps = false;

    protected $fillable = ['codigogestor', 'nomegestor', 'cpfcnpjgestor', 'emailgestor', 'usuarioredminegestor', 'senharedminegestor', 'chaveacessoapiredminegestor'];

    public function gestorsistema(){

    	return $this->hasOne('SBAnalysis\Models\GestorSistemaModel', 'codigogestor');
    }
}
