<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MonitoringStatus
 *
 * @property-read \App\ParameterStatus $parameterStatus
 * @mixin \Eloquent
 */
class MonitoringStatus extends Model {


    protected $table = 'monitoring_status';


    public function parameterStatus()
    {
        return $this->belongsTo(ParameterStatus::class, 'status_id', 'id');
    }

}
