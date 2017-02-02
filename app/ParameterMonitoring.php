<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ParameterMonitoring
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Monitoring[] $monitoring
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\DataLogMonitoring[] $dataLogMonitoring
 * @mixin \Eloquent
 */
class ParameterMonitoring extends Model {


    protected $table = 'parameter_monitoring';


    public function monitoring()
    {
        return $this->hasMany(Monitoring::class, 'parameter_id', 'id');
    }


    public function dataLogMonitoring()
    {
        return $this->hasMany(DataLogMonitoring::class, 'parameter_id', 'id');
    }


}
