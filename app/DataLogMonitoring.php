<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DataLogMonitoring
 *
 * @property-read \App\ParameterMonitoring $parameterMonitoring
 * @mixin \Eloquent
 */
class DataLogMonitoring extends Model {


    protected $table = 'datalog_monitoring';


    public function parameterMonitoring()
    {
        return $this->belongsTo(ParameterMonitoring::class, 'parameter_id', 'id');
    }
}
