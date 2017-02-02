<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ParameterStatus
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\MonitoringStatus[] $monitoringStatus
 * @mixin \Eloquent
 */
class ParameterStatus extends Model {


    protected $table = 'parameter_status';


    public function monitoringStatus()
    {
        return $this->hasMany(MonitoringStatus::class, 'status_id', 'id');
    }
}
