<?php

namespace SBAnalysis\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'codigocliente';
    public $timestamps = false;

    protected $fillable = ['codigocliente', 'codigoskyupdate', 'codigocns', 'razaosocial', 'nomeoficial', 'cpfcnpjoficial', 'endereco', 'cidade', 'uf', 'cep', 'telefone'];

    public function clientesistema(){

    	return $this->hasOne('SBAnalysis\Models\ClienteSistemaModel', 'codigocliente');
    }
}
