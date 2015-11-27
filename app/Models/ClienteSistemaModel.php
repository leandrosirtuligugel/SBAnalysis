<?php

namespace SBAnalysis\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteSistemaModel extends Model
{
    protected $table = 'clientesistema';
    protected $primaryKey = 'codigoclientesistema';
    public $timestamps = false;

    protected $fillable = ['codigoclientesistema', 'codigocliente', 'codigosistema', 'contratoemvigor'];

    public function sistema(){

    	return $this->belongsTo('SBAnalysis\Models\SistemaModel', 'codigosistema');
    }
}
