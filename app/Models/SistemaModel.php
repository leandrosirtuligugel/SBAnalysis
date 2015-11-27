<?php

namespace SBAnalysis\Models;

use Illuminate\Database\Eloquent\Model;

class SistemaModel extends Model
{
    protected $table = 'sistema';
    protected $primaryKey = 'codigosistema';
    public $timestamps = false;

    protected $fillable = ['codigosistema', 'nomesistema'];

}
